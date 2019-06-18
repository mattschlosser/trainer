<? 


include_once("../interfaces/IQuestion.php");

class DBQuestion implements IQuestion {
    private $db;
    private $quizID;
    private $id;

    public function __construct() {
        $n = func_num_args();
        $a = func_get_args();
        if ($n == 3) {
            echo 'yes';
            $db = $a[0];
            $quizID = $a[1];
            $id = $a[2];
            $this->db = $db;
            $this->quizID = $quizID;
            $this->id = $id;
        }
    }

    public function setQuestionText($questionText) {
        throw new Exception(__METHOD__ . " is not implemented");
    }

    public function getQuestionText() {
        $query = "SELECT questionText FROM questions WHERE sectionID = '$this->quizID' and id = '$this->id'";
        $result = $this->db->querySingle($query);
        return $result;
    }

    public function addAnswer($answer) {
        throw new Exception(__METHOD__ . " is not implemented. Please manually add to the DB");
    }

    public function getAnswer($id) {
        $answers = $this->getAnswers();
        return $answers[$id];
    }

    public function getAnswers() {
        $query = "SELECT answers FROM questions WHERE sectionID = '$this->quizID' AND id = $this->id;";
        $result = $this->db->querySingle($query);
        echo $result;
        return unserialize($result);
    }

    public function setSolution($solution) {
        throw new Exception(__METHOD__ . " is not implemented");
    }
    
    public function getSolution() {
        $query = "SELECT solution FROM questions WHERE sectionID = '$this->quizID' AND id = '$this->id'";
        $result = $this->db->querySingle($query);
        return $result;
    }
}


?>