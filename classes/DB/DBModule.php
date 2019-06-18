<?

include_once('../interfaces/IModule.php');
include_once('../classes/DB/DBSection.php');

/**
 * The class DBModule implemets connectivity to an SQLite database. 
 * 
 * Originally, the module was designed with just in memory objects. Howver, these
 * objects were entirely created on every page load, which isn't necessary. 
 * 
 * @param SQLite3 $db A SQLite3 Databse object
 * 
 * @param string $id The ID of the module you are refering to. 
 */
class DBModule implements IModule {

    private $db;

    public function __construct() {
        $n = func_num_args();
        $a = func_get_args();
        if ($n == 2) {
            $db = $a[0];
            $id = $a[1];
            $this->db = $db;
            $this->id = $id;
        }
    }

    function setTitle($title) {
        $this->db->exec("UPDATE modules SET title = $title WHERE id = $this->id");
    }

    function getTitle() {
        $query = "SELECT title FROM modules WHERE id = '$this->id'";
        $result = $this->db->querySingle($query); 
        return $result;
    }   

    function setTitleImage($img) {
        $this->db->exec("UPDATE modules SET titleImage = $img WHERE id = '$this->id'");
    }

    function getTitleImage() {
        $query = "SELECT titleImage FROM modules WHERE id = '$this->id'";
        $result = $this->db->querySingle($query);
        return $result;
    }

    function addSection(ISection $section) {
        throw new Exception("Not implemented. Please add manually to the DB");
    }

    function getSections() {
        $sections = array();
        $query = "SELECT id FROM sections WHERE moduleID = '$this->id'";
        $result = $this->db->query($query);
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $section = new DBSection($this->db, $row['id']);
            $sections[$row['id']] = $section;
        }
        return $sections;
    }

    function getNumSections() {
        $query = "SELECT count(id) as count FROM sections WHERE moduleID = '$this->id'";
        $result = $this->db->querySingle($query);
        return $result;
    }

    function getSection($id) {
        $query = "SELECT id FROM sections WHERE moduleID = '$this->id' AND id = '$id'";
        $result = $this->db->querySingle($query);
        return new DBSection($this->db, $result);
    }

    function getID() {
        return $this->id;
    }
}

?>