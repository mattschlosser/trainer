<?php 

include_once('../interfaces/IQuestion.php');

interface IQuiz {
    function addQuestion(IQuestion $question);
    function getQuestions();
    function getQuestion($id);
    function getQuestionCount();
}

?>