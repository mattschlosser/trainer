<?
/**
 * Matt Schlosser
 * June 2019
 */
include_once("../interfaces/ISection.php");
include_once("../interfaces/IQuiz.php");

/**
 * This class enapsulates the data for a camp training section. 
 * 
 * You compose it by setting an IQuiz, and then adding it to an IModule. 
 */
class CampTrainingSection implements ISection {
    private $pages;
    private $title;
    private $titleImage;
    private $quiz;
    private $id;

    public function __construct()
    {
        $a = func_get_args();
        $n = func_num_args();
        if ($n == 1) {
            $this->id = $a[0];
        } else {
            throw new Exception("One argument expected: You must specify an id in the constructor of " . __CLASS__ . ". " . $n . " were given.");
        }
    }
    
    public function setQuiz(IQuiz $quiz) {
        $this->quiz = $quiz;
    }
    public  function getQuiz() {
        return $this->quiz;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function getTitle() {
        return $this->title;
    }

    public function setTitleImage($img) {
        $this->titleImage = $img;
    }

    public function getTitleImage() {
        return $this->titleImage;
    }
    public function setNumPages($num) {
        $this->pages = $num;
    }
    public function getNumPages() {
        return $this->pages;
    }
    public function getID() {
        return $this->id;
    }
}

?>