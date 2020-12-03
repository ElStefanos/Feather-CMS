<?php

    namespace Settings;

    use Database\Database;

    class Settings extends DataBase
    {
        protected $db;
        protected $connect;
        protected $content;

        public function __construct()
        {
            $this->db = new DataBase;
            $this->connect = $this->db->db_connect();
        }


        public function ReadSettings_Specific($name)
        {   
            if($this->db->db_connect()) {
            $stmt = $this->connect->prepare("SELECT * FROM `fc_settings` WHERE `name` = ?");
            $stmt->bind_param('s', $name);
            $stmt->execute();
            $stmt->bind_result($name, $state, $additional_value, $perm);
            $stmt->store_result();
            $stmt->fetch();
            $stmt->close();

            switch ($additional_value) {
                case '':
                    $additional_value = 'NONE';
                    break;
                
                default:
                    $additional_value = $additional_value;
                    break;
            }

            return $out = array('name' => $name, 'state' => $state, 'additional_value' => $additional_value, 'perm' => $perm);
        }
    }

        public function ReadSettings()
        {   
            if($this->db->db_connect()) {

                $settings = array();
    
                $stmt = $this->connect->prepare("SELECT * FROM `fc_settings`");
                $stmt->execute();
                $stmt->bind_result($name, $state, $additional_value, $perm);
                $stmt->store_result();
    
                while($stmt->fetch()) {
                    $out = array('name' => $name, 'state' => $state, 'additional_value' => $additional_value, 'perm' => $perm);
                    $settings[$name] = $out;
                }
    
                return $settings;
            }
        }

        public function ReadSettings_Print($setting, $ontrue, $onfalse)
        {
            $read = $this->ReadSettings_Specific($setting);

            if ($read['state'] == 'TRUE') {
                echo $ontrue;
            } else {
                echo $onfalse;
            }
        }

        public function AddToOther($content)
        {
            $this->content = $content;
        }

        public function LoadOther()
        {
            return $this->content;
        }


    }

?>