<?php 

include_once('../interfaces/IQuiz.php');

interface ISection {
    function setQuiz(IQuiz $quiz);
    function getQuiz();
    function setTitle($title);
    function getTitle();
    function getID();
    function setNumPages($num);
    function getNumPages();
    function setTitleImage($img);
    function getTitleImage();
}

?>