<?
include_once("../interfaces/IQuestion.php");

/**
 * This class encapsulates the data strucutre for a camp training question. 
 * 
 * Once this is composed, it is meant to be added to an ISection. 
 * 
 * @param string $question The question. 
 * @param string[] $answers An array of multiple choice answers. 
 * @param int $soution The index of the array of answers which is the solution. 
 */
class CampTrainingQuestion implements IQuestion {
    private $questionText;
    private $answers;
    private $solution;

    public function __construct()
    {
        $args = func_get_args();
        $c = func_num_args();
        if ($c == 3) {
            $this->__construct1($args[0], $args[1], $args[2]);
        } else {
            $this->answers = array();
        }
    }

    public function __construct1($question, $answers, $solution) {
        $this->answers = array();
        $this->setQuestionText($question);

        foreach ($answers as $answer) {
            $this->addAnswer($answer);
        }

        $this->setSolution($solution);
    }

    /**
     * Sets the text of the question. Not needed if using the 3 parameter constructor format. 
     * 
     * @param string $questionText The text of the question. 
     */
    public function setQuestionText($questionText) {
        $this->questionText = $questionText;
    }

    /**
     * Gets the text of a question. 
     * 
     * @return string The text of the question. 
     */
    public function getQuestionText() {
        return $this->questionText;
    }

    /**
     * Adds an answer to the question. The answer will be added to the end of the current options. 
     * 
     * @param string $answer The text of the answer. 
     */
    public function addAnswer($answer) {
        array_push($this->answers, $answer);
    }

    /**
     * Gets an answer by its index. 
     * 
     * @param $id The index of the answer you want. 
     * 
     * @return stirng The text of the answer. 
     */
    public function getAnswer($id) {
        return $this->answers[$id];
    }

    /**
     * Returns an array of answers. 
     * 
     * @return string[] An array of answers. 
     */
    public function getAnswers() {
        return $this->answers;
    }

    /**
     * Sets the solution of a question. 
     * 
     * @param int $solution The index of the array of answers which is the solution. 
     */
    public function setSolution($solution) {
        $this->solution = $solution;
    }

    /**
     * Gets the solution, which is the index of the array. 
     * 
     * Using, for example $question->getSolution(); returns an index, which can then be
     * used with $question->getAnswer($question->getSolutioN()) to get the text of the
     * solution
     * 
     * @return int The index of the solution. 
     */
    public function getSolution() {
        return $this->solution;
    }

    /**
     * Checks if the given id is the solution. 
     * 
     * @return boolean Result of comparison. 
     */
    public function isSolution($id) {
        return $this->getSolution() === $id;
    }
}

?>