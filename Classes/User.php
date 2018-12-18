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
class User
{
    private $_db = null;
    /**
     * Construct
     * 
     * @param Database $db Database
     */
    public function __construct(Database $db)
    {
        session_start();
        $this->db = $db;
    } 
    /**
     * Destruct database
     */
    public function __destruct()
    {
        $this->db = null;
    }
    /**
     * Logs in user
     * 
     * @param string $nick Username
     * @param string $pass User password
     * 
     * @return bool
     */
    public function Login($nick, $pass)
    {
        if (!isset($nick) || !isset($pass)) {
            echo "<h3>No login or pass typed</h3>";
            return false;
        }
        $nick = htmlentities($nick, ENT_QUOTES, "UTF-8");
        $result = $this->db->query("SELECT COUNT(*) FROM users WHERE nick='$nick'");
        if ($result) {
            $count = $result->fetchColumn(); 
            if ($count > 0) {
                $result1 = $this->db->query("SELECT * FROM users WHERE nick='$nick'");
                $row = $result1->fetch(PDO::FETCH_ASSOC);
                if (password_verify($pass, $row['pass'])) {
                    $_SESSION['logged'] = true;
                    return true;
                } else {
                    Throw new Exception('Passwords dont match');
                }
            } else {
                Throw new Exception('No user found');
            }
        }
    }
    /**
     * Register user
     * 
     * @param string $nick Username
     * @param string $mail User mail
     * @param string $pass User password
     * 
     * @return bool
     */
    public function Register($nick,$mail, $pass) 
    {
        if (isset($nick)) {
            $validate = true;
            if (strlen($nick)<4) {
                $validate = false;
                $_SESSION['error_nick'] = "Nick is too short. Minimum 4 chars";
            }

            if (ctype_alnum($nick)==false) {
                $validate = false;
                $_SESSION['error_nick'] = "Nick has incorrect chars.";
            }

            $emailB = filter_var($mail, FILTER_SANITIZE_EMAIL);

            if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$mail)) {
                $wszystko_OK=false;
                $_SESSION['e_email']="Email incorrect. Check spelling";
            }

            if (strlen($pass)<8) {
                $validate = false;
                $_SESSION['error_pass'] = "Password is too weak. Minimum 8 chars";
            }
            $pass = password_hash($pass, PASSWORD_ARGON2I);
            try{
                $result = $this->db->query("SELECT COUNT(id) FROM users WHERE mail = '$mail'");
                $count = $result->fetchColumn(); 
                if ($count > 0) {
                    $validate = false;
                    $_SESSION['error_mail'] = "There is account with this mail";
                }
                $result1 = $this->db->query("SELECT COUNT(id) FROM users WHERE mail = '$nick'");
                $count1 = $result1->fetchColumn(); 
                if ($count1 > 0) {
                    $validate = false;
                    $_SESSION['error_nick'] = "There is account with this nick";
                }
                if ($validate == true) {
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