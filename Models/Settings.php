<?php
require_once '../bbcode.php';
class Settings{

    public function __construct()
    {
      $this->db = new PDO('sqlite:../messaging.sqlite3');
      $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $settings = $this->db->query("SELECT * FROM settings");
      $sett1 = $settings->fetch(PDO::FETCH_ASSOC);
      $this->name = $sett1['name'];
    } 
    public function __destruct()
    {
      $this->db = null;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $name1 =$this->getName();
        $sql = "UPDATE settings SET name='$name' WHERE name = '$name1'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }
    public function insertPost($f1,$f2,$f3){
        $sql = "INSERT INTO messages (title, message, time) VALUES (:f1, :f2, :f3)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(':f1'=>$f1,':f2'=>$f2,':f3'=>$f3));
        $affected_rows = $stmt->rowCount();
        $file_db = null;
    }
}
$Settings = new Settings;
echo $Settings->getName();
$Settings->setName("Tfuj");