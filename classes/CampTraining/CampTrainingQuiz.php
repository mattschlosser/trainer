<?
/**
 * Matt Schlosser
 * June 2019
 */

include_once("../interfaces/IQuiz.php");
include_once("../interfaces/IQuestion.php");

/**
 * This class encapsulates the data for a camp training quiz. 
 * 
 * You compose this by adding objects of type IQuestion to it, and and setting it as the quiz
 * for an ISection. 
 */
class CampTrainingQuiz implements IQuiz {
    private $questions;

    public function __construct()
    {
        $this->questions = array();
    }

    /** 
     * Adds a question to the quiz.
     * 
     * Here you must first construct $question to be of type IQuestion. 
     * 
     * @param IQuestion $question The question which you wish to add. 
     */
    public function addQuestion(IQuestion $question) {
        array_push($this->questions, $question);
    }

    /**
     * Gets all questions from the quiz
     * 
     * @return IQuestion[] An array of questions. 
     */
    public function getQuestions() {
        return $this->questions;
    }

    /**
     * Gets a specific question from the quiz
     * 
     * @return IQuestion The question, in question :)
     */
    public function getQuestion($id) {
        return $this->questions[$id];
    }

    /**
     * Returns the number of questions in the quiz;
     * 
     * @return int The number of questions. 
     */
    public function getQuestionCount() {
        return count($this->questions);
    }
}

?>