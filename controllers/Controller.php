<?php

/** 
*
* By Matt Schlosser
* June 2019
*/


include_once('../models/Model.php');
include_once('../classes/Score/Score.php');
include_once('../classes/User/User.php');
include_once("../classes/Utils/ScoreCalc.php");

/**
* The Controller class for the application. Controls logic between the Model and the Views
* 
* Prepares variables to be rendered in each view, and determines which view to show, pased
* on the current URL and POST state. 
*
**/
class Controller {
    private $model;
    public function __construct()
    {
        $this->model = new Model(); 
    }

    public function invoke() {
        $user = null;
        if (!isset($_SESSION['user'])) {
            $user = new User();
            $_SESSION['user'] = serialize($user);
        } else {
            $user = unserialize($_SESSION['user']);
        }
        if (!isset($_GET['module'])) {
            $modules = $this->model->getModules();
            include '../views/AllModules.php';
        } else {
            // a user wants a specific module
            $moduleID = htmlspecialchars($_GET['module']);
            $module = $this->model->getModule($moduleID);
            
//            if a user doesn't have a score yet, make one
            if ($user->hasScore($module->getID()) == false) {
                $score = new Score($module->getID());
                echo $score->getID();
                $user->addScore($score);
            }

            if (!isset($_GET['section'])) {
                if (isset($_GET['showSections']) || isset($_GET['submit'])) {
                    $sections = $module->getSections();
                    $userScores = array();
                    $scoreCard = $user->getScore($module->getID());
                    $sectionIsCompleted = array();
                    $sectionsFinished = 0;
                    foreach ($sections as $section) {   
                        
                        $sectionAns = $scoreCard->getSectionAnswers($section->getID()); 
                        if ($sectionAns) {
                            $correct = ScoreCalc::NumberCorrect($sectionAns, $section->getQuiz());
                            
                            $userScores[$section->getID()] = $correct;

                            $answeredEveryQuestion = ScoreCalc::DidUserAnswerEveryQuestion($sectionAns, $section->getQuiz());
                            if ($answeredEveryQuestion) {
                                $sectionsFinished += 1;
                                $sectionIsCompleted[$section->getID()] = true;
                            }
                        }
                    }
                    $userFinishedAllSections = ($sectionsFinished === $module->getNumSections()) ? true : false;
                    if (isset($_GET['showSections'])) {
                        include '../views/Module.php';
                    } else {
                        if (isset($_POST['name']) && isset($_POST['email'])) {
                            $allFeedback;
                            if (!($user->hasSubmitted($module->getID()))) {
                                $name = htmlspecialchars($_POST['name']);
                                $email = htmlspecialchars($_POST['email']);
                                $user->setName($name);
                                $user->setEmail($email);
                                $user->submitted($module->getID());
                                $allFeedback = $scoreCard->getAllFeedback();
                            }
                            include '../views/SubmitSuccess.php';
                        } else {
                            include '../views/Submit.php';   
                        }
                    }
                } elseif (isset($_GET['intro'])) {
                    $introID = (is_numeric($_GET['intro'])) ? $_GET['intro'] : 0;
                    include '../views/Intro.php';
                } else {
                    include '../views/ModuleTitle.php';
                }
            } else {
                $sectionID = htmlspecialchars($_GET['section']);
                $section = $module->getSection($sectionID);
                // do section again?
                if (isset($_POST['retry'])) {
                    $user->getScore($module->getID())->reset($section->getID());
                }
                if (isset($_GET['retry'])) {
                    include '../views/Retry.php';
                }
                elseif (!isset($_GET['page']) && !isset($_GET['quiz'])) {
                    include '../views/Section.php';
                } elseif (!isset($_GET['quiz'])) {
                    $page = (is_numeric($_GET['page'])) ? $_GET['page'] : 0;
                    include '../views/Page.php';
                } else {
                    $quiz = $section->getQuiz();
                    $questionID = (is_numeric($_GET['quiz'])) ? $_GET['quiz'] : 0;
                    $question = $quiz->getQuestion($questionID);
                    $score = $user->getScore($module->getID());
                    if (isset($_POST['answer'])) {
                        $score->recordAnswer(
                            $section->getID(),
                            $questionID,
                            htmlspecialchars($_POST['answer'])
                        );
                    }
                    if (isset($_POST['feedback'])) {
                        $score->recordFeedback(
                            $section->getID(),
                            $questionID,
                            htmlspecialchars($_POST['feedback'])
                        );
                    }
                    $answered = $score->isAnswered(
                        $section->getID(),
                        $questionID
                    );
                    $feedbacked = $score->hasFeedback(
                        $section->getID(),
                        $questionID
                    );
                    $solution = (int) $question->getSolution();
                    $userAnswer;
                    if ($answered) {
                        $userAnswer = (int) $score->getAnswer(
                            $section->getID(),
                            $questionID
                        );
                    }
                    $feedback;
                    if ($feedbacked) {
                        $feedback = $score->getFeedback(
                            $section->getID(),
                            $questionID
                        );
                    }
                    include '../views/Quiz.php';
                }
            }
        }
        if (isset($_SESSION['user'])) {
            $_SESSION['user'] = serialize($user);
        }
    }
}

?>