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
    }
    public function getPostsStyled($id){
        $result = $this->db->query("SELECT * FROM messages ORDER BY id DESC LIMIT 6");
        foreach($result as $row) {
            $time = date("Y-m-d", $row['time']);
            echo '
            <a href="article?id='.$row['id'].'" class="post">
                <div>
                    <p class="title">'.htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8').'</p>
                    <p class="content">'.$row['message'].'</p>
                    <p class="time">'.$time.'</p>
                </div>
            </a>
          ';
          if($id == true){ 
            echo '<span>'.$row['id'].'</span>';
        }
          }
    }
    public function findOnePost($id){
        $result = $this->db->query("SELECT COUNT(*) FROM messages WHERE id=$id");
        if ($result){
            $count = $result->fetchColumn(); 
            if($count > 0){
                $result1 = $this->db->query("SELECT * FROM messages WHERE id = $id");
                foreach($result1 as $row) {
                    $time = date("Y-m-d", $row['time']);
                    echo '
                        <div class="post">
                            <span class="title">'.htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8').'</span>
                            <p class="content">'.$row['message'].'</p>
                            <span class="time">'.$time.'</span>
                        </div>
                    ';
                }
            }else{
                echo "404";
            }
        }
    }
    public function findNextPost($id){
        $result = $this->db->query("SELECT COUNT(*) FROM messages WHERE id=$id+1");
        if ($result){
            $count = $result->fetchColumn(); 
            if($count > 0){
                $result1 = $this->db->query("SELECT * FROM messages WHERE id = $id+1");
                foreach($result1 as $row) {
                    $time = date("Y-m-d", $row['time']);
                    echo '
                        <div class="post">
                            <span class="title">'.htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8').'</span>
                            <p class="content">'.$row['message'].'</p>
                            <span class="time">'.$time.'</span>
                        </div>
                    ';
                }
            }else{
                echo "404";
            }
        }
    }
    public function findPerviousPost($id){
        $result = $this->db->query("SELECT COUNT(*) FROM messages WHERE id=$id-1");
        if ($result){
            $count = $result->fetchColumn(); 
            if($count > 0){
                $result1 = $this->db->query("SELECT * FROM messages WHERE id = $id-1");
                foreach($result1 as $row) {
                    $time = date("Y-m-d", $row['time']);
                    echo '
                        <div class="post">
                            <span class="title">'.htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8').'</span>
                            <p class="content">'.$row['message'].'</p>
                            <span class="time">'.$time.'</span>
                        </div>
                    ';
                }
            }else{
                echo "404";
            }
        }
    }
    public function insertPost($f1,$f2,$f3){
        $sql = "INSERT INTO messages (title, message, time) VALUES (:f1, :f2, :f3)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(':f1'=>$f1,':f2'=>$f2,':f3'=>$f3));
        $affected_rows = $stmt->rowCount();
        $file_db = null;
    }
}