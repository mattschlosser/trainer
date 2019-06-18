<?php 

include_once("../interfaces/ISection.php");

interface IModule {

    function setTitle($title);
    function getTitle();

    function setTitleImage($img);
    function getTitleImage();

    function addSection(ISection $section);
    function getSections();
    function getNumSections();
    function getSection($id);

    function getID();
}
?>
