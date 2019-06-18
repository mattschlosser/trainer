<!DOCTYPE html>
<html>
    <head>
        <title> <?= $section->getTitle();?></title>
        <? include 'partials/header.php' ?>
    </head>
    <body>
        <nav class='top'>
            <div class="wide">
                <!-- <a href='./'>Main Menu</a> >  -->
                <a href="./?module=<?= $module->getID(); ?>"><?= $module->getTitle();?></a> > 
                <a href="./?module=<?= $module->getID(); ?>&section=<?= $_GET['section'] ?>"><?= $section->getTitle(); ?></a>
            </div>
        </nav>
        <div class="content">
        <span class="message red">You have already completed this section. You can reset your score and try this section again if you would like. </span>


        </div>

        <nav class='bottom'>
            <div class="wide nav-grid">
                <a class='back' href='./?module=<?=$module->getID()?>&showSections'>Back</a>
                <form method="post" action='./?module=<?=$module->getID()?>&section=<?=$section->getID()?>'>
                    <button class="danger" type="submit" name="retry" value="yes">Reset</button>
                </form>
            </div>
        </nav>

    </body>
</html>

