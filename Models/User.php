<?php
class User{
    public $nick;
    public $mail;

    public function __construct()
    {
      session_start();
      $this->db = new PDO('sqlite:./messaging.sqlite3');
      $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } 
    public function __destruct()
    {
      $this->db = null;
    }
    public function Login($nick, $pass){
        if(!isset($nick)|| !isset($pass)){
            echo "<h3>No login or pass typed</h3>";
            return false;
        }
        $nick = htmlentities($nick, ENT_QUOTES, "UTF-8");
        $result = $this->db->query("SELECT COUNT(*) FROM users WHERE nick='$nick'");
        if ($result){
            $count = $result->fetchColumn(); 
            if($count > 0){
                $result1 = $this->db->query("SELECT * FROM users WHERE nick='$nick'");
                $row = $result1->fetch(PDO::FETCH_ASSOC);
                if($pass == $row['pass']){
                    $_SESSION['logged'] = true;
                }else{
                    echo "false1\n";
                }
            }else{
                echo "false\n";
            }
        }
    }
}