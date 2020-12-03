<?php

    namespace Themes;

    use DataBase\DataBase;
    use API;

    class Themes 
    {
        private $db;
        private $connect;

        private $api;
        private $status;
        public $theme;
        public $themeVersion;

        public function __construct()
        {
            $this->api = new API;
            $this->db = new Database;
            $this->status = 'true';
            $this->connect = $this->db->db_connect();
        }

        public function LoadThemes() {
            if($this->connect == true) {
                $stmt = $this->connect->prepare("SELECT * FROM `fc_themes` WHERE `status` = ?");
                $stmt->bind_param('s', $this->status);
                $stmt->execute();
                $stmt->bind_result($this->theme, $this->themeVersion, $this->status);
                $stmt->store_result();
                $stmt->fetch();
                $stmt->close();

                $this->theme = str_replace(' ', '_', $this->theme);
                $path = __THEMESPATH__.$this->theme.'/'.$this->theme.'.theme.php';

                
                
                if(file_exists($path)) {
                    if (!$this->api->GetUrl('desired', 'fc_admin')) {
                        if (!$this->api->CheckForGet('debuger')) {
                            include_once $path;
                        }
                    }
                } else {
                    echo 'Failed loading theme';
                    $this->api->PushToDebuger('debuger_errors', 'Failed loading theme: '.$this->theme.' <br> Invalid Path: '.$path);
                }

            } else {
                die('Internal error');
                exit();
            }
        }

    }
?>