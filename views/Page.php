<!DOCTYPE html>
<html>
    <head>
        <title> <?= $section->getTitle();?></title>
        <? include 'partials/header.php' ?>
        <link rel="stylesheet" href="./styles/<?= $module->getID(); ?>.css"/>
    </head>
    <body>
        <nav class='top'>
            <div class="wide">
                <!-- <a href='./'>Main Menu</a> >  -->
                <a href="./?module=<?= $module->getID(); ?>"><?= $module->getTitle();?></a> > 
                <a href="./?module=<?= $module->getID(); ?>&section=<?= $section->getID() ?>"><?= $section->getTitle(); ?></a>
            </div>
        </nav>

        <div class="content">
        <? include 'modules/' . $module->getID() . '/' . $section->getID() . '/' . $page . '.html'; ?>
        </div>

        <nav class='bottom'>
            <div class="wide nav-grid">
                <? if ($page > 0) { ?>
                    <a class='back' href='./?module=<?=$module->getID()?>&section=<?=$section->getID()?>&page=<?=$page-1?>'>Back</a>
                <? } else { ?>
                    <a class='back' href='./?module=<?=$module->getID()?>&section=<?=$section->getID()?>'>Back</a>
                <? } ?>
                <? if ($page < $section->getNumPages()-1) { ?>
                    <a href='./?module=<?=$module->getID()?>&section=<?=$section->getID()?>&quiz=0'>Jump to Quiz</a>
                    <a href='./?module=<?=$module->getID()?>&section=<?=$section->getID()?>&page=<?=$page+1?>'>Next</a>
                    
                <? } else { ?>
                    <a href='./?module=<?=$module->getID()?>&section=<?=$section->getID()?>&quiz=0'>Start Quiz</a>
                <? } ?>
            </div>
        </nav>

    </body>
</html>

