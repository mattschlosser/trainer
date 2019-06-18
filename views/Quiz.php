<!DOCTYPE html>
<html>
    <head>
        <title><?= $section->getTitle(); ?> Quiz - Online Training</title>
        <? include 'partials/header.php'; ?>
    </head>
    <body>
        <nav class="top">
            <div class="wide">
            <!-- <a href='./'>Main Menu</a> >  -->
                <a href="./?module=<?= $module->getID(); ?>"><?= $module->getTitle();?></a> > 
                <a href="./?module=<?= $module->getID(); ?>&section=<?= $_GET['section'] ?>"><?= $section->getTitle(); ?></a>
            </div>
        </nav>
        <div class="content" ">
            <? $answers = $question->getAnswers(); ?>
            <!-- <img src="./images/<?= $module->getID() ?>/questions-background.jpg" alt="" style="position:absolute;top:0;left:0;z-index:-1"/> -->
            <h1><?= $section->getTitle(); ?> Quiz</h1>
            <? if ($answered && $userAnswer === $solution)  { ?>
                <span class='message'>That's correct</span>
            <? } elseif ($answered) { ?> 
                <span class='message red'>Sorry. The correct answer was 
                    "<?= $answers[$solution] ?>"
                    <br/><br/>
                    <? if (!$feedbacked) { ?>
                    Still confused? Enter a question or comment below. It will be sent with your results to camp. 
                    This is optional. 
                    <form method="post">
                        <textarea name="feedback"></textarea>
                        <button type="submit">Submit</button>
                    </form>
                    <? } else { ?>
                        You provided the following feedback:<br/><br/>
                        <span class='prewrap'>"<?= $feedback ?>"</span>
                    <? } ?>
                </span>
            <? } ?>
            <p> <?= $question->getQuestionText(); ?> </p>
            <div class="question">
                <ul>

            <form method="post">
            <? foreach ($answers as $id => $answer) { ?>
                <li >
                    <input type='radio' name="answer" id='<?= $id ?>' value='<?= $id ?>'
                            <?= ($answered) ? "disabled" : null ?> />
                        <? if ($answered) {  ?>
                            <? if ($userAnswer === $id && $userAnswer === $solution) { ?>
                                <label for="<?= $id ?>" class="chosen correct" >
                            <? } elseif ($userAnswer === $id) { ?>
                                <label for="<?= $id ?>" class="chosen" >
                            <? } elseif ($solution === $id) { ?>
                                <label for="<?= $id ?>" class="correct" >
                            <? } else { ?>
                                <label for="<?= $id ?>" >
                            <? } ?>
                        <? } else { ?>
                            <label for="<?= $id ?>" >
                        <? } ?>
                        <?= $answer ?>
                    </label>
                </li>
            <? } ?> 
                </ul>
            </div>

        </div>
        <nav class="bottom">
            <div class="wide nav-grid">
            
            <? if ($questionID > 0) { ?>
                <a class='back' href="?module=<?= $module->getID() ?>&section=<?= $section->getID() ?>&quiz=<?= $questionID-1?>">Back</a>
            <? } else { ?>
                <a class='back' href="?module=<?= $module->getID() ?>&section=<?= $section->getID() ?>&page=<?= $section->getNumPages()-1?>">Back</a>
            <? } ?>
            <? if (!$answered) { ?>
            <button type="submit">Check Answer</button>

            </form>
            <? } else { ?>
                <? if ($questionID < $quiz->getQuestionCount()-1) { ?>
                    <a href="?module=<?= $module->getID() ?>&section=<?= $section->getID() ?>&quiz=<?= $questionID+1?>">Next Question</a>
                <? } else { ?>
                    <a href="?module=<?= $module->getID() ?>&showSections=true">Return to Sections</a>
                <? } ?>
            <? } ?> 
            </div>
        </nav>
        
    </body>
</html>