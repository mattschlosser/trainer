<?php 
/**
 * Matt Schlosser
 * June 2019
 */

include_once("../data/RiskManagement.php");
include_once("../data/TestModule.php");
include_once("../classes/Modules/Modules.php");
include_once("../classes/DB/DBModule.php");
/**
 * The Model class manages the different training modules available.
 */
class Model {

    public function __construct()
    {  
        $this->modules = new Modules();
        $this->modules->addModule(RiskManagementFactory::create());
        $this->modules->addModule(MyGreatModule::create());
    //    $db = new SQLite3("../my.db", SQLITE3_OPEN_READONLY);
    //    $this->modules->addModule(new DBModule($db, "risk-management-2"));
        // TODO new modules will be added here. 
    }

    /**
     * Gets a module by its ID.
     * 
     * @param string $id The ID of the module. 
     * 
     * @return IModule The module, or null if none exists. 
     */
    public function getModule($id) {
        return $this->modules->getModule($id);
    }
    
    /**
     * Gets an array all modules. 
     * 
     * @return IModule[] An array of IModules. 
     */
    public function getModules() {
        return $this->modules->getModules();
    }
}

?>