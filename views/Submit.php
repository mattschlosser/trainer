<!DOCTYPE html>
<html>
    <head>
        <title> Submit - <?=  $module->getTitle();?></title>
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
            <div class="submit">
                <? $info = ($user->getName() == "" || $user->getEmail() == "") ? true : false;
                if ($info) {?>
                    Before you submit, tell us who you are:
                <? } else { ?>
                    It looks like we already have your info. If this look good, go ahead and submit. 
                <? } ?>
<form method="post">
                    <span class="group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?= $user->getName() ?>" placeholder="Bob Jones" required/>
                    </span>
                    <span class="group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?= $user->getEmail()?>" placeholder="bjones@aoi.net" required/>
                    </span>
                
            </div>
        </div>

        <nav class='bottom'>
            <div class="wide nav-grid">
                
                    <a class='back' href='./?module=<?=$module->getID()?>&showSections=true'>Back</a>
                
                    <button type="submit">Submit</button>
</form>
            </div>
        </nav>

    </body>
</html>

