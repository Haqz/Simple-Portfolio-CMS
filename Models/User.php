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
                if(password_verify($pass , $row['pass'])){
                    $_SESSION['logged'] = true;
                    echo "no kurwa ziomek";
                }else{
                    if(password_verify($pass , '$argon2i$v=19$m=1024,t=2,p=2$amI1MTY5bjFQdDdZOUVUSw$AZfnWKqxs2/2hxc52eelvBudSav9TJy6IGJdtmIEu4k')) echo "działa";
                }
            }else{
                echo "false\n";
            }
        }
    }
    public function Register($nick,$mail, $pass){
        if(isset($nick)){
            $validate = true;
            if(strlen($nick)<4){
                $validate = false;
                $_SESSION['error_nick'] = "Nick is too short. Minimum 4 chars";
            }

            if(ctype_alnum($nick)==false){
                $validate = false;
                $_SESSION['error_nick'] = "Nick has incorrect chars.";
            }

		    $emailB = filter_var($mail, FILTER_SANITIZE_EMAIL);
		
		    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$mail))
		    {
			    $wszystko_OK=false;
			    $_SESSION['e_email']="Podaj poprawny adres e-mail!";
		    }

            if(strlen($pass)<8){
                $validate = false;
                $_SESSION['error_pass'] = "Password is too weak. Minimum 8 chars";
            }
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            try{
                $result = $this->db->query("SELECT COUNT(id) FROM users WHERE mail = '$mail'");
                $count = $result->fetchColumn(); 
                if($count > 0){
                    $validate = false;
                    $_SESSION['error_mail'] = "There is account with this mail";
                }
                $result1 = $this->db->query("SELECT COUNT(id) FROM users WHERE mail = '$nick'");
                $count1 = $result1->fetchColumn(); 
                if($count1 > 0){
                    $validate = false;
                    $_SESSION['error_nick'] = "There is account with this nick";
                }
                if($validate == true){
                    $stmt = $this->db->prepare("INSERT INTO users(nick,mail,pass) VALUES(:f1,:f2,:f3)");
                    $stmt->execute(array(':f1'=>$nick,':f2'=>$mail,':f3'=>$pass));
                    $affected_rows = $stmt->rowCount();
                    echo "Udało się !!!";
                }
            }catch(Exception $e){
                echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
                echo '<br />Informacja developerska: '.$e;
            }
        }
    }
}