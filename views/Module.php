<!DOCTYPE html>
<html>
    <head>
        <title> <?= $module->getTitle(); ?> - Online Training </title>
        <? include 'partials/header.php'; ?>
    </head>
    <body>
        <nav class='top'>
            <div class="wide">
                <?= $module->getTitle(); ?>
            </div>  
        </nav>
        <div class="content">
            <h1> <?= $module->getTitle(); ?> </h1>
            Click on a section to begin:
            <ul class="sections">
                <? foreach ($sections as $id => $section) { ?>
                    <li>
                        
                        <a href="?module=<?= $module->getID(); ?>&section=<?= $id ?><?= ($sectionIsCompleted[$section->getID()]) ? "&retry" : "" ?>" 
                        <?= ($sectionIsCompleted[$section->getID()]) ? "class='completed'" : "" ?> >
                            <?= $section->getTitle(); ?><br/>
                            <span class='score'> 
                                <?= (array_key_exists($section->getID(), $userScores)) 
                                    ? $userScores[$section->getID()] : null ?>
                            </span>
                        </a>
                    </li>
                <? } ?>
            </ul>
            <? if (!$userFinishedAllSections) { ?>
                One you have completed all sections, you will be able to submit your answers to camp. 
            <? } elseif (!$user->hasSubmitted($module->getID())) { ?>
                You have finished all the sections. You an now submit your answers to camp below
            <? } else { ?>
                This module has been submitted. If you would like to start over, clear the cookies for this site.
            <? } ?>
        </div>
        <? if ($userFinishedAllSections) { ?>
            <nav class='bottom'>
                <div class='wide nav-grid'>
                    <? if (!$user->hasSubmitted($module->getID())) { ?>
                    <a href='./?module=<?= $module->getID() ?>&submit=true'>Submit to Camp</a>
                    <? } ?>
                </div>
            </nav>
        <? } ?>
    </body> 
</html>
