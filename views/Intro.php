<!DOCTYPE html>
<html>
    <head>
        <title> <?= $module->getTitle();?></title>
        <? include 'partials/header.php' ?>
    </head>
    <body>
        <nav class='top'>
            <div class="wide">
            <!-- <a href='./'>Main Menu</a> >  -->
            <?= $module->getTitle(); ?>
            </div>
        </nav>
        <div class="content">
        <? include 'modules/' . $module->getID() . "/" . "intro" . "/" . $_GET['intro'] . '.html'; ?>
        </div>
        <nav class='bottom'>
            <div class='wide'>
                <a href='./?module=<?=$module->getID()?>&showSections=true'>Start Module</a>
            </div>
        </nav>
    </body>
</html>

