<?php
class Settings{

    public function __construct()
    {
        $this->db = new PDO('sqlite:./messaging.sqlite3');
        $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $settings = $this->db->query("SELECT * FROM settings");
        $sett1 = $settings->fetch(PDO::FETCH_ASSOC);

        $style = $this->db->query("SELECT * FROM style");
        $style1 = $style->fetch(PDO::FETCH_ASSOC);

        $this->name = $sett1['name'];
        $this->author = $sett1['author'];
        $this->style = $style1;
    } 
    public function __destruct()
    {
      $this->db = null;
    }
    public function getName(){
        return $this->name;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function getStyleFile($file = "tmp/main.uwu"){
        $myfile = fopen($file, "r");
        if($myfile == null) return false;
        return fread($myfile,filesize($file));
        fclose($myfile);
    }
    public function getStyleClass($class){
        return $this->style[$class];
        if($this->style[$class] == null){
            return false;
        }
    }
    public function setName($name){
        $name1 = $this->getName();
        $sql = "UPDATE settings SET name='$name' WHERE name = '$name1'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }
}