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
            <img src="./images/<?= $module->getID(); ?>/<?= $module->getTitleImage(); ?>" />
        </div>
        <nav class='bottom'>
            <div class='wide'>
                <a href='./?module=<?= $module->getID(); ?>&intro=0' />Start Module</a>
            </div>
        </nav>
    </body> 
</html>
