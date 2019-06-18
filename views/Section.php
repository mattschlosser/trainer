<!DOCTYPE html>
<html>
<head>
    <title><?= $section->getTitle(); ?> - Online Training</title>
    <? include 'partials/header.php'; ?>
</head>
<body>
    <nav class='top'>
        <div class="wide">
            <!-- <a href="./">Main Menu</a> >  -->
            <a href="./?module=<?=$module->getID() ?>"><?= $module->getTitle() ?></a> >
            <?= $section->getTitle(); ?>
        </div>
    </nav>
    <div class="content">
        <h1><?= $section->getTitle(); ?></h1>
        <img src="./images/<?= $module->getID() ?>/<?= $section->getTitleImage() ?>" />
    </div>
    <nav class='bottom'>
        <div class="wide nav-grid">
            <a class='back' href="?module=<?= $module->getID() ?>&showSections=true">Back</a>
            <a href="?module=<?= $module->getID() ?>&section=<?= $section->getID(); ?>&quiz=0">Jump to Quiz</a>
            <a href="?module=<?= $module->getID() ?>&section=<?= $section->getID(); ?>&page=0">Start</a>
        </div>
    </nav>      
    </body>
</html>