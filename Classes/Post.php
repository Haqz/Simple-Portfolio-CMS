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

class Post //Post model
{
    private $_database = null;
    public function __construct(Database $database)
    {
        $this->db = $database;
    } 

    public function __destruct()
    {
        $this->db = null;
    }
    
    public function insertPost($title,$message,$time)
    {
        $sql = "INSERT INTO messages (title, message, time) VALUES (:title, :message, :time)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(
            array(
                ':title' => $title, 
                ':message' => $message, 
                ':time' => $time
            )
        );
        $affected_rows = $stmt->rowCount();
        $file_db = null;
    }
    public function findPostData($id)
    {
        return $this->db->getOne($id, 'messages');
    }
    public function getLatestPostsData()
    {
        return $this->db->getLimited('messages');
    }
    
}
