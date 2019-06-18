<?
/** 
 * By: Matt Schlosser
 * June 2019
 */

 /** 
 * The Score class manages the scores for each module. 
 * 
 * Scores are identified by section-id and by question number
 * 
 * For example, if you had a module:
 *  id of module: my-example-module
 *  ids of sections of module:  
 *      section-1
 *      section-2
 *      section-3
 *  then you could find the answers to each section by going
 *  score->getAnswer("section-1", 0), and you would get the answer
 *  for that qusetion, if nay. 
*/
class Score {
    private $id;
    private $sectionAnswers;
    private $sectionFeedback;

    public function __construct() {
        $n = func_num_args();
        $a = func_get_args();

        if ($n == 1) {
            $this->__construct1($a[0]);
        } else {
            throw new Exception("One argument expected for " . __CLASS__ . " constructor. " . $n . " were given.");
        }
    }

    public function __construct1($id) {
        $this->id = $id;
        $this->sectionAnswers = array();
        $this->sectionFeedback = array();
    }

    /**
     * Returns the ID of the instance.
     * 
     * @return string The ID of the Score. 
     */
    public function getID() {
        // returns the ID of the current Score.
        return $this->id;
    }


    /**
     * Records the current user's answer.
     * 
     * @param string $sectionID The ID of the section. 
     * 
     * @param int $questionID The question number. 
     * 
     * @param int $ans The answer the user chose. 
     */
    public function recordAnswer($sectionID, $questionID, $ans) {
        if (!key_exists($sectionID, $this->sectionAnswers)) {
            $this->sectionAnswers[$sectionID] = array();
        }
        $this->sectionAnswers[$sectionID][$questionID] = $ans;
    }


    /**
     * Records the current user's feedback for the answer.
     * 
     * @param string $sectionID The ID of the seection. 
     * 
     * @param int $questionID The question number. 
     * 
     * @param int $feedback The feedback the user sent. 
     */
    public function recordFeedback($sectionID, $questionID, $feedback) {
        if (!key_exists($sectionID, $this->sectionFeedback)) {
            $this->sectionFeedback[$sectionID] = array();
        }
        $this->sectionFeedback[$sectionID][$questionID] = htmlentities($feedback);
    }

    /**
     * Resets the score for a section
     * 
     * @param string $sectionID The section to reset
     */
    public function reset($sectionID) { 
        if (key_exists($sectionID, $this->sectionAnswers)) {
            unset($this->sectionAnswers[$sectionID]);
            unset($this->sectionFeedback[$sectionID]);
        }
    }

    /**
     * Checks if a user has already answered a question. 
     * 
     * @param string $sectionID The ID of the section. 
     * 
     * @param int $quesitonID The number of the question. 
     * 
     * @return boolean Did the user answer the question?
     */
    public function isAnswered($sectionID, $questionID) {
        // checks if the user has answered a question
        return !($this->getAnswer($sectionID, $questionID) === false);
    }

    /**
     * Checks if a user has entered feedback for a question. 
     * 
     * @param string $sectionID The ID of the section. 
     * 
     * @param int $quesitonID The number of the question. 
     * 
     * @return boolean Did the user provide feedback for the question?
     */
    public function hasFeedback($sectionID, $questionID) {
        return !($this->getFeedback($sectionID, $questionID) === false);
    }

    /**
     * Looks up the answer for what a user answered. 
     * 
     * @param string $sectionID The ID of the section. 
     * 
     * @param int $quesitonID The number of the question. 
     * 
     * @return int THe index of the answer, or false if none. 
     */
    public function getAnswer($sectionID, $questionID) {
        // returns the user's answer for a given question (int) or false if 
        // the user has not answered the quesiton. 
        if (key_exists($sectionID, $this->sectionAnswers)) {
            if (key_exists($questionID, $this->sectionAnswers[$sectionID])) {
                return $this->sectionAnswers[$sectionID][$questionID];
            }
        }
        return false;
    }

    /**
     * Looks up the feedback for what a user entered. 
     * 
     * @param string $sectionID The ID of the section. 
     * 
     * @param int $quesitonID The number of the question. 
     * 
     * @return string The feedback or false, if none. 
     */
    public function getFeedback($sectionID, $questionID) {
        // returns the user's answer for a given question (int) or false if 
        // the user has not answered the quesiton. 
        if (key_exists($sectionID, $this->sectionFeedback)) {
            if (key_exists($questionID, $this->sectionFeedback[$sectionID])) {
                return $this->sectionFeedback[$sectionID][$questionID];
            }
        }
        return false;
    }

    /**
     * Returns the answers for a given section, if anny
     * 
     * @param string $sectionID The id of the section. 
     * 
     * @return int[] A dictionary of the answers, if any; 
     */
    public function getSectionAnswers($sectionID) {
        if (key_exists($sectionID, $this->sectionAnswers)) {
            return $this->sectionAnswers[$sectionID];
        }
        return null;
    }

    /**
     * Returns the feedback for a given section, if anny
     * 
     * @param string $sectionID The id of the section. 
     * 
     * @return int[] A dictionary of the feedback, if any; 
     */
    public function getSectionFeedback($sectionID) {
        if (key_exists($sectionID, $this->sectionFeedback)) {
            return $this->sectionFeedback[$sectionID];
        }
        return null;
    }

    /**
     * Returns the feedback for all sections, if anny
     * 
     * @param string $sectionID The id of the section. 
     * 
     * @return int[] A dictionary of the feedback, if any; 
     */
    public function getAllFeedback() {
        return $this->sectionFeedback;
    }
}
?>