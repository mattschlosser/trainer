<?


include_once("../interfaces/IQuiz.php");

class ScoreCalc {
    public static function DidUserAnswerEveryQuestion($answer, IQuiz $quiz) {
        $answered = true;
        $n = $quiz->getQuestionCount();
        for ($i = 0; $i < $n; $i++) {
            if (!array_key_exists($i, $answer)) {
                $answered = false;
                break;
            }
        }
        return $answered;
    }

    public static function NumberCorrect($answer, IQuiz $quiz){
        $correct = 0;
        $n = $quiz->getQuestionCount();
        for ($i = 0; $i < $n; $i++) {
            if (key_exists($i, $answer) && $answer[$i] == $quiz->getQuestion($i)->getSolution()) {
                $correct += 1;
            } 
        }
        return $correct;
    }
}

?>