<?php
/**
 * Matt Schlosser 
 * June 2019
 */

include_once("../interfaces/IModule.php");
include_once("../interfaces/ISection.php");

/**
 * This class encapsulates the data structre for the model 
 * 
 * You compose it by adding types of ISection to it, and also given it a name, title 
 * and location of title photo, relative to /public/images/module-id/
 * 
 */
class CampTrainingModule implements IModule {
    private $title;
    private $titleImage;
    private $sections;
    private $id;

    public function __construct()
    {   
        $a = func_get_args();
        $n = func_num_args();
        if ($n == 1) {
            $this->sections = array();
            $this->id = $a[0];
        } else {
            throw new Exception("One argument expected: You must specify an id in the constructor of " . __CLASS__ . ". " . $n . " were given.");
        }
    }

    /**
     * Sets the title of the current module
     * 
     * @param string $title The title of the module. 
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Gets the title of the module
     * 
     * @return string The title. 
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Returns the file name of the image to be used for the title
     * 
     * The program expects this file to be stored at ./images/module-id/ where
     * module-id is the id of your module (you set this when saying new CampTrainingModule("your-id-here"))
     * 
     * @param string $img The filename of the title image. 
     */
    public function setTitleImage($img) {
        $this->titleImage = $img;
    }

    /**
     * Returns the filename of the title image. 
     * 
     * The program expects this file to be stored at ./images/module-id/ where
     * module-id is the id of yoru module (you set this when saying new CampTrainingMoudle("your-id-here"));
     * 
     * @return string The title image. 
     */
    public function getTitleImage() {
        return $this->titleImage;
    }

    /**
     * Adds an ISection to the module. 
     * 
     * @param ISection $section The section to add. 
     */
    public function addSection(ISection $section) {
        $this->sections[$section->getID()]=$section;
    }

    /**
     * Returns an array of ISections. 
     * 
     * @return ISection[] The ISections currently added to the IModule. 
     */
    public function getSections() {
        return $this->sections;
    }

    /**
     * Returns the number of sections currently added to the IModule. 
     * 
     * @return int The number of sections. 
     */
    public function getNumSections()
    {
        return count($this->sections);
    }

    /**
     * Gets a section by its indentifer, assuming it exists. 
     * 
     * @param string $id The id of the setion. 
     * 
     * @return ISection The section you requested. 
     */
    public function getSection($id) {
        return $this->sections[$id];
    }

    /**
     * Gets the ID of the IModule
     * 
     * @return string The ID. 
     */
    public function getID()
    {
        return $this->id;
    }
}


?>