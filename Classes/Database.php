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
    public function __construct($file = 'messaging.sqlite3')
    {
        $this->db = new PDO('sqlite:./'.$file);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 

    public function __destruct()
    {
        $this->db = null;
    }

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
    public function query($query)
    {
        $stmt = $this->db->query($query);
        return $stmt;
    }
}
