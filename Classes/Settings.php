<?php
/**
 * MyClass File Doc Comment
 *
 * @category Models
 * @package  S-P-CMS
 * @author   Haqz <maszynista91@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/Haqz/Simple-Portoflio-CMS
 */

/*
Depracted!!!!
Need to be redesigned and rewritten soon!!!
*/

class Settings
{

    private $_database = null;
    public function __construct(Database $database)
    {
        $this->db = $database;
        $style = $this->db->getAll('style');

        $settings = $this->db->getAll('settings');


        $this->name = $settings['name'];
        $this->author = $settings['author'];
        $this->style = $style;
    } 
    public function __destruct()
    {
      $this->db = null;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getStyleFile($file = "tmp/main.uwu")
    {
        $myfile = fopen($file, "r");
        if ($myfile == null) {
            return false; 
        }
        return fread($myfile, filesize($file));
        fclose($myfile);
    }
/*
Depracted!!!!
Need to be redesigned and rewritten soon!!!
*/
    public function getStyleClass($class)
    {
        return $this->style[$class];
        if ($this->style[$class] == null) {
            return false;
        }
    }
    public function setName($name)
    {
        $name1 = $this->getName();
        $sql = "UPDATE settings SET name='$name' WHERE name = '$name1'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }
}