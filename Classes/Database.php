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
class Database
{
    /**
     * Return row
     * 
     * @param string $file File to construct class
     */
    public function __construct($file = 'messaging.sqlite3')
    {
        $this->db = new PDO('sqlite:./'.$file);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    /**
     * Destruct database
     */
    public function __destruct()
    {
        $this->db = null;
    }
    /**
     * Return one row
     * 
     * @param int    $id    Id of row
     * @param string $table Table to query on
     * 
     * @return Object
     */
    public function getOne($id,$table)
    {
        try{
            $sql = "SELECT * FROM $table WHERE id = $id";
            $stmt = $this->db->query($sql);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                throw new Exception('No row found');
            }
            return $row;
        } catch(Exception $e){
            echo "Exception found: ".$e->getMessage();
        }
    }
    /**
     * Return all rows
     * 
     * @param string $table Table to query on
     * 
     * @return Object
     */
    public function getAll($table)
    {
        try{
            $sql = "SELECT * FROM $table";
            $stmt = $this->db->query($sql);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                throw new Exception('No row found');
            }
            return $row;
        } catch(Exception $e){
            echo "Exception found: ".$e->getMessage();
        }
    }
    /**
     * Return limited rows
     * 
     * @param string $table Table to query on
     * @param int    $limit How many rows to return
     * 
     * @return Object
     */
    public function getLimited($table, $limit = 6)
    {
        try{
            $sql = "SELECT * FROM $table ORDER BY id DESC LIMIT $limit";
            $stmt = $this->db->query($sql);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!$row) {
                throw new Exception('No row found');
            }
            return $row;
        } catch(Exception $e){
            echo "Exception found: ".$e->getMessage();
        }
        
    }
    /**
     * Return query object
     * 
     * @param string $query Query to execute
     * 
     * @return Object
     */
    public function query($query)
    {
        $stmt = $this->db->query($query);
        return $stmt;
    }
    /**
     * Prepare statement
     * 
     * @param string $query Query to execute
     * 
     * @return Object
     */
    public function prepare($query)
    {
        return $this->db->prepare($query);
    }
    /**
     * Prepare statement
     * 
     * @param Array $arr Query to execute
     * 
     * @return Object
     */
    public function execute(&$arr)
    {
        return $this->db->execute(array($arr));
    }
}