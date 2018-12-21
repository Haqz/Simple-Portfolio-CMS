<?php
namespace SPC;
/**
 * MyClass File Doc Comment
 *
 * @category Models
 * @package  S-P-CMS
 * @author   Haqz <maszynista91@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/Haqz/Simple-Portoflio-CMS
 */
class Settings
{

    private $_database = null;
    /**
     * Construct
     * 
     * @param Database $database Database
     */
    public function __construct(Database $database)
    {
        $this->db = $database;
        $style = $this->db->getAll('style');

        $settings = $this->db->getAll('settings');


        $this->name = $settings['name'];
        $this->author = $settings['author'];
        $this->style = $style;
    } 
    /**
     * Destruct
     */
    public function __destruct()
    {
        $this->db = null;
    }
    /**
     * Return name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Return author
     * 
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }
    /**
     * Return custom css file content
     * 
     * @param string $file Custom style file
     * 
     * @return string
     */
    public function readStyleFile($file = "tmp/main.uwu")
    {
        $myfile = fopen($file, "r+");
        if ($myfile == null) {
            return false; 
        }
        return fread($myfile, filesize($file));
        fclose($myfile);
    }
    /**
     * Write custom css file content
     * 
     * @param string $data Custom style data
     * @param string $file Custom style file
     * 
     * @return string
     */
    public function writeStyleFile($data, $file = "tmp/main.uwu")
    {
        $myfile = fopen($file, "w+");
        if ($myfile == null) {
            Throw new Exception('File not found'); 
        }
        fwrite($myfile, $data);
        fclose($myfile);
    }
    /*
    Depracted!!!!
    Need to be redesigned and rewritten soon!!!
    */
    /**
     * Return css class
     * 
     * @param string $class Class from database
     * 
     * @return string
     */
    public function getStyleClass($class)
    {
        return $this->style[$class];
        if ($this->style[$class] == null) {
            return false;
        }
    }
    /**
     * Sets owner name
     * 
     * @param string $name Name to be set
     * 
     * @return string
     */
    public function setName($name)
    {
        $name1 = $this->getName();
        $sql = "UPDATE settings SET name='$name' WHERE name = '$name1'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }
    
}