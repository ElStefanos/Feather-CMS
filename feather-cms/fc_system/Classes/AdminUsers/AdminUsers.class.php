<?php 

    namespace AdminUsers;

    use DataBase\DataBase;


    class AdminUsers extends DataBase
    {
        private $db;
        private $connect;

        public function __construct()
        {
            $this->db = new Database;
            $this->connect = $this->db->db_connect();
        }
        
        public function Admin_Login($username, $password) {
            
            if(isset($username) && isset($password)) {
                
                $stmt = $this->connect->prepare("SELECT * FROM `fc_admin` WHERE `username` = ?");
                $stmt->bind_param('s', $username);
                $stmt->execute();
                $stmt->bind_result($id, $username, $hash_password, $permission);
                $stmt->store_result();

                if($stmt->num_rows == 1) {

                    $stmt->fetch();

                    if (password_verify($password, $hash_password)) {

                        session_start();
                        $_SESSION['loged_in'] = 1;
                        $_SESSION['username'] = $username;
                        $_SESSION['hash_password'] = $hash_password;
                        $_SESSION['permission'] = $permission;
                        $_SESSION['id'] = $id;

                        header("Location: home.php?login=success");
                        exit();
                    } else {
                        return 0;
                    }
                } else {
                    return 0;
                }
            }
        }

        public function Admin_Check() {
            
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $pg = $_SERVER['PHP_SELF'];
            $pg = explode('/', $pg);
            if (in_array('index.php', $pg)) {
                if (isset($_SESSION['loged_in'])) {
                    header("Location: home.php");
                    exit();
                }
            } else {
                if (!isset($_SESSION['loged_in'])) {
                    header("Location: http://".__DOMAIN__."/fc_admin/index.php");
                    exit();
                }
            }
        }
        
        public function VerifyUser($password) {

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if (password_verify($password,$_SESSION['hash_password'])) {
                return 1;
            } else {
                return 0;
            }
        }

        public function Admin_Logout() {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            unset( $_SESSION['loged_in']);
            unset($_SESSION['id']);
            unset($_SESSION['username']);
            unset( $_SESSION['password']);
            unset( $_SESSION['permission']);

            session_destroy();

            header("Location: ./index.php");
            exit();
        }

        public function Get_User_Info() {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $info = array('username' => $_SESSION['username'], 'permission' => $_SESSION['permission'], 'id' => $_SESSION['id']);
            return $info;
        }

        public function __destruct()
        {
            
        }
    }
?>