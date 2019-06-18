<?

include_once("../interfaces/ISection.php");
include_once("../classes/DB/DBQuiz.php");

class DBSection implements ISection {

    private $id;

    public function __construct() {
        $n = func_num_args();
        $a = func_get_args();
        if ($n == 2) {
            $db = $a[0];
            $id = $a[1];
            $this->db = $db;
            $this->id = $id;
        }
    }

    function setQuiz(IQuiz $quiz) {
        throw new Exception(__METHOD__ . " not implemented. Please manually add to the DB.");
    }
    
    function getQuiz() {
        return new DBQuiz($this->db, $this->id);
    }

    function setTitle($title) {
        throw new Exception("Not implemented");
    }

    function getTitle() {
        $query = "SELECT title FROM sections WHERE id = '$this->id'";
        $result = $this->db->querySingle($query);
        return $result;
    }

    function getID() {
        return $this->id;
    }

    function setNumPages($num) {
        throw new Exception(__METHOD__ . " is not implemented. Please manually add to DB.");
    }

    function getNumPages() {
        $query = "SELECT numPages FROM sections WHERE id = '$this->id'";
        $result = $this->db->querySingle($query);
        return $result;
    }

    function setTitleImage($img) {
        throw new Excpetion(__METHOD__ . " is not implemented. Please manually add to DB.");
    }

    function getTitleImage() {
        $query = "SELECT titleImage FROM sections WHERE id = '$this->id'";
        $result = $this->db->querySingle($query);
        return $result;
    }
}

?>