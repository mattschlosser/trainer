<!DOCTYPE html>
<html>
    <head>
        <title>All Modules - Online Training</title>
        <meta name="title" content="All Modules" />
        <meta name="description" content="A list of all the training modules Camp Sagitawa offers online" />
        <meta name="encoding" content="UTF-8" />
        <? include 'partials/header.php' ?>
    </head>
    <body>
        <nav class="top">
            <div class='wide'>
                Modules
            </div>
        </nav>
        <div class="content">
        <h1>Online training offerings</h1>
        <ul class="sections">
        <? foreach ($modules as $id => $module) { ?>
            <li><a href="?module=<?= $id?>"><?= $module->getTitle(); ?></a></li>
        <? } ?>
        </ul>
        </div>
    </body>
</html>
