<?php 
/*

By: Matt Schlosser
June 2019
*/

include_once('../interfaces/IModule.php');
include_once('../classes/Score/Score.php');

/**
 * 
* The User class manages the current user. It holds the name, email
* of the user, as well as the scores of the quizzes for each module 
* the user has done since their session started. A user can complete
*
*/
class User {
    private $name;
    private $email;
    private $scores;
    private $submittedModules;

    public function __construct()
    {
        $a = func_get_args();
        $n = func_num_args();
        
        $this->scores = array();
        $this->submittedModules = array();
    }

    /**
     * Checks if a user has submitted a module. 
     * 
     * @return boolean if user has submitted module. 
     */
    public function hasSubmitted($moduleID) {
        return array_key_exists($moduleID, $this->submittedModules);
    }

    /**
     * Marks that user has summited there score of a current module.. 
     * 
     * @param string The id of the IModule that has been submitted. 
     */
    public function submitted($moduleID) {
        $this->submittedModules[$moduleID] = true;
    }

    /**
     * Gets the name of the current user. 
     * 
     * @return string The user's name. 
     */
    public function getName() {
        // gets the users name
        return $this->name;
    }

    /**
     * Sets the name of the current user.
     * 
     * @param string $name
     */
    public function setName($name) {
        // sets the users name
        $this->name = $name;
    }

    /**
     * Sets the email of the current user
     * 
     * @param string $email The users email. 
     */
    public function setEmail($email) {  
        // TODO validate email. 
        $this->email = $email;
    }

    /**
     * Gets the email of the current user, if any
     * 
     * @return string The email. 
     */
    public function getEmail() {
        // returns the users email, if any
        return $this->email;
    }

    /** 
     * Checks if a score exists for the current module. 
     * 
     * @return boolean if the score exists. 
     */
    public function hasScore($moduleID) {
        // checks if a user has a score record for a module
        return key_exists($moduleID, $this->scores);
    }

    /** 
     * Adds a Score to the current collection of scores for the user. 
     * 
     * This will only be done if a score with the same id does not already exist. 
     * 
     * @param Score $score The users score for a module. 
     */
    public function addScore(Score $score) {
        // adds a score record for a module for the current user
        if (!$this->hasScore($score->getID())) {
            //then do something
            $this->scores[$score->getID()] = $score;
        } else {
           // don't
        }

    }

    /**
     * Gets the score for a module. 
     * 
     * @param string $moduleID The id of the module you want the score for. 
     * 
     * @return Score The score of the module, if any; null otherwise. 
     */
    public function getScore($moduleID) {
        // gets the score record for a module for the current user. 
        if ($this->hasScore($moduleID)) {
            return $this->scores[$moduleID];
        } else {
            return null;
        }
    }
}

?>