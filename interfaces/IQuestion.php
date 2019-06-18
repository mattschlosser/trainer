<?php 

interface IQuestion {
    public function setQuestionText($questionText);
    public function getQuestionText();

    public function addAnswer($answer);
    public function getAnswer($id);
    public function getAnswers();

    public function setSolution($solution);
    public function getSolution();
}

?>