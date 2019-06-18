<?

include_once("../interfaces/IQuiz.php");
include_once("../classes/DB/DBQuestion.php");

class DBQuiz implements IQuiz {
    private $db;
    private $id;

    function __construct() {
        $n = func_num_args();
        $a = func_get_args();
        if ($n == 2) {
            $db = $a[0];
            $id = $a[1];
            $this->db = $db;
            $this->id = $id;
        }
    }

    function addQuestion(IQuestion $question) {
        throw new Exception(__METHOD__ . " not Impletemented. Please Manually add to the DB");
    }

    function getQuestions() {
        throw new Exception("not implemented");
        // $questions = array();
        // $query = "SELECT id FROM questions WHERE sectionID = '$this->id' ORDER BY id ASC";
        // $results = $this->db->query($query);
        // foreach ($results as $result) {
        //     $question = new DBQuestion($this->db, $result['id']);
        //     $questions[$question->getID()] = $question;
        // }
        // return $questions;
    }

    function getQuestion($id) {
        return new DBQuestion($this->db, $this->id, $id);
    }

    function getQuestionCount() {
        $query = "SELECT count(*) as count FROM questions WHERE quizID = '$this->id'";
        $result = $this->db->querySingle($query);
        return $result;
    }
}

?>