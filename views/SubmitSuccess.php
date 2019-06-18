<!DOCTYPE html>
<html>
    <head>
        <title> Submit<?=  $module->getTitle();?></title>
        <? include 'partials/header.php' ?>
    </head>
    <body>
        <nav class='top'>
            <div class="wide">
                <!-- <a href='./'>Main Menu</a> >  -->
                <a href="./?module=<?= $module->getID(); ?>"><?= $module->getTitle();?></a> 
                
            </div>
        </nav>
        <div class="content">
            Thanks. Your results have NOT been sent to the camp office. 

            Becuase it actually isn't set up yet. .. 

            Here's what the email would like:
<span style="white-space:pre-wrap;">
To: Camp
From: <?= $user->getEmail(); ?>

<?= $user->getName() ?> (<?= $user->getEmail() ?>) completed the <?= $module->getTitle() ?> Online Training Module. 
Their final score was <?= array_sum($userScores); ?>

The user had the following feedback for the following questions:
<? foreach ($scoreCard->getAllFeedback() as $sectionID => $sectionFeedback) {
    foreach ($sectionFeedback as $questionID => $questionFeedback) { ?>
    <? $question = $module->getSection($sectionID)->getQuiz()->getQuestion($questionID); ?>

For question "<?= $question->getQuestionText() ?>", the solution was "<?= $question->getAnswer($question->getSolution()) ?>" but they answered "<?= $question->getAnswer($scoreCard->getAnswer($sectionID, $questionID)); ?>"
Feedback:
<?= $questionFeedback; ?>        
<?    }
}
?>
</span>

        <nav class='bottom'>
            <div class="wide nav-grid">
                
                    <a class='back' href='./?module=<?=$module->getID()?>&showSections=true'>Back</a>
                
                   
</form>
            </div>
        </nav>

    </body>
</html>

