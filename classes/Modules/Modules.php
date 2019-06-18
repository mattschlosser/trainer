<?
/*

Matt Schlosser
June 2019

Handles the collection of modules. 
Simply an array. 

*/
class Modules {
    private $modules;

    public function __construct()
    {
        $this->modules = array();
    }

    /**
     * Adds a new module
     * 
     * @param IModule $module The module to add. 
     */
    public function addModule(IModule $module) {
        $this->modules[$module->getID()] = $module;
        
    }

    /** 
     * Gets a module with an the $id from the array
     * 
     * @param string $id The id of the module
     * 
     * @return IModule The module you seek, if any. 
    **/
    public function getModule($id) {
        return $this->modules[$id];
    }

    /**
     *  Gets all modules
     * 
     *  @return IModule[] An array of IModules.  
    **/
    public function getModules() {
        return $this->modules;
    }

}
?>