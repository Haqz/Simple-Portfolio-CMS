<?php
require_once './bbcode.php';
class Post{
    public $title = "";
    public $content = "";
    public $time = "";

    public function __construct()
    {
      $this->db = new PDO('sqlite:./messaging.sqlite3');
      $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } 
    public function __destruct()
    {
      $this->db = null;
    }
    public function getPostsRaw(){
        $result = $this->db->query("SELECT * FROM messages ORDER BY id ASC");
        foreach($result as $row) {
            echo '
            <p>'.$row['id'].'
            '.$row['title'].'
            '.$row['message'].'
            '.$row['time'].'</p>
          ';
          }
        $file_db = null;
    }
    public function getPostsStyled($id){
        $result = $this->db->query("SELECT * FROM messages ORDER BY id DESC LIMIT 7");
        foreach($result as $row) {
            $time = date("Y-m-d", $row['time']);
            echo '
            <div class="post">
                <span class="title">'.htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8').'</span>
                <p class="content">'.$row['message'].'</p>
                <span class="time">'.$time.'</span>
            </div>
          ';
          if($id == true){ 
            echo '<span>'.$row['id'].'</span>';
        }
          }
        $file_db = null;
    }
    public function insertPost($f1,$f2,$f3){
        $sql = "INSERT INTO messages (title, message, time) VALUES (:f1, :f2, :f3)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(':f1'=>$f1,':f2'=>$f2,':f3'=>$f3));
        $affected_rows = $stmt->rowCount();
        $file_db = null;
    }
}
