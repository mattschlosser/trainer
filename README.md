# Training Module

This is a system I designed for a summer camp I have volunteered at. It's general enough that I belive others could use it elsewhere. I place it here as part of my portfolio. 

## Dependencies

* PHP 5.3.9+

## Installation and Setup

* Place on a web server with PHP
* Programatically add modules. 
* Point users to the public directory. 

## Adding modules. 

* Modules can be currently added in two ways, or write your own using the provided interface methods. 

### In Memory

* Modules can be created using the `CampTrainingModule` class like so

```php

class MyGreatModule {
    public static function create() {

        $myModule = new CampTrainingModule("an-id-goes-here");
        $myModule->setTitle("This is the name of your training module");
    
        $section = new CampTrainingSection("a-section-id-goes-here");
        $section->setTitle("This is the name of your section");
        // once you tell how many pages you want
        // just add them to the directory at 
        // /views/moudles/an-id-goes-here/a-section-id-goes-here/
        // name them 0.html, 1.html, 2.html, and 3.html
        $section->setNumPages(4);
        $myModule->addSection($section);
    
        $quiz = new CampTrainingQuiz();
        $section->setQuiz($quiz);
    
        $question = new CampTrainingQuestion(
            "which of the following has Matt never done?",
            array(
                "Been outside North America?",
                "Owned an apple product",
                "Given a public speech"
            ),
            0
        );
        $quiz->addQuestion($question);
    
        return $myModule;
    }
} 
```

### SQLite 3 Database interface. 

Assuming a DB with the following schema:
```sql
CREATE TABLE modules (id PRIMARY KEY, title, titleImage);
CREATE TABLE sections (id PRIMARY KEY, title, titleImage, moduleID, numPages, 
FOREIGN KEY (moduleID) REFERENCES modules(id));
CREATE TABLE questions(sectionID, id, questionText, answers, solution, primary key (sectionID, id), foreign key (sectionID) references sections(id));
```

Most of these are strings or integers, with the exception of questions(answers) with is a PHP serialized array. 

You can then hook up a module in `models/Model.php` by using the `DBModule` class

If you have your db stored in a file called `my.db`, then:

```php
$db = new SQLite3("my.db", SQLITE3_OPEN_READONLY);
$this->modules->addModule(new DBModule($db, "id-of-module-in-db-you-want-to-add"));
```

Perhaps the Model class could be written better to accept a whole database of modules. :P

## Directory Structure

The program assumes the following.
* Each module created has a folder in `/views/modules/MODULE_ID/` where `MODULE_ID` is the id of your madule. 
* Each section created has a folder in `/views/modules/MODULE_ID/SECTION_ID/` where `SECTION_ID` is the id of the section. 
* In each section, there are pages numbered `0.html` through `n-1.html`, where `n` is the number of pages in that section. 
* Each module's images are stored in a folder at `/public/images/MODULE_ID/`
* Each module has it's own stylesheet at `/public/styles/MODULE_ID.css`
* Each module has an intro page, located at `/views/modules/MODULE_ID/intro/0.html`
* Each module and each section has a title iamge. It should be defined when setting up the `IModule` class. It
is assumed to be stored at `/public/images/MODULE_ID`