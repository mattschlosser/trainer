<?

/* 

This is a sample test module

*/

include_once("../classes/CampTraining/CampTrainingModule.php");
include_once("../classes/CampTraining/CampTrainingQuestion.php");
include_once("../classes/CampTraining/CampTrainingQuiz.php");
include_once("../classes/CampTraining/CampTrainingSection.php");



class MyGreatModule {
    public static function create() {

        $myModule = new CampTrainingModule("an-id-goes-here");
        $myModule->setTitle("This is the name of your training module");
    
        $section = new CampTrainingSection("a-section-id-goes-here");
        $section->setTitle("This is the name of your section");
        // once you tell how many pages you want
        // just add them to the directory at 
        // /views/moudles/an-id-goes-here/a-section-id-goes-here/
        // name them 0.html, 1.html, 2.html, and 3.html
        $section->setNumPages(4);
        $myModule->addSection($section);
    
        $quiz = new CampTrainingQuiz();
        $section->setQuiz($quiz);
    
        $question = new CampTrainingQuestion(
            "which of the following has Matt never done?",
            array(
                "Been outside North America?",
                "Owned an apple product",
                "Given a public speech"
            ),
            0
        );
        $quiz->addQuestion($question);
    
        return $myModule;
    }
} 

?>