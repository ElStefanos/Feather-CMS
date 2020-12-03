<?php

class API {

        public function Page_Loader_Admin($mode = '')
        {
             switch ($mode) {
                 case 'multi':

                    if(isset($_GET['multi']) && isset($_GET['pgm']) && isset($_GET['pathm'])) {

                        $pg = $_GET['pgm'];
                        $path = $_GET['pathm'];
        
                        if(!empty($pg) && !empty($path)) {
                            if(file_exists($path . '/' . $pg)) {
                                include_once $path . '/' . $pg;
                            } else {
                                die('Error requesting the page with path: '. $path . '/' . $pg);
                                exit();
                            }
                        }
        
                        }else{
                            $current_p = $_SERVER['PHP_SELF'];
        
                            $path = explode('/', $current_p);
        
                            if(in_array('home.php', $path) && in_array('fc_admin', $path)) {
                                include_once './extensions/preview.inc.php';
                            }
                        }

                 break;
                 
                 default:

                     if(isset($_GET['path']) && isset($_GET['pg'])) {
    
                         $pg = $_GET['pg'];
                         $path = $_GET['path'];
         
                         if(!empty($pg) && !empty($path)) {
                             if(file_exists($path . '/' . $pg)) {
                                 include_once $path . '/' . $pg;

                             } else {
                                 die('Error requesting the page with path: '. $path . '/' . $pg);
                                 exit();
                             }
                         }
         
                         }else{
                             $current_p = $_SERVER['PHP_SELF'];
         
                             $path = explode('/', $current_p);
         
                             if(in_array('home.php', $path) && in_array('fc_admin', $path)) {
                                 include_once './extensions/preview.inc.php';
                             }
                         }

                     break;
             }

        }

        public function Page_Path_Set($location = '', $path = '', $pg, $pathm='', $pgm='')
         {

            switch ($location) {
                case 'this':
                    $current_p = $_SERVER['PHP_SELF'];
                    return $current_p.'?path='.$path.'&pg='.$pg;
                    break;

                    case 'multi':
                        $current_p = $_SERVER['PHP_SELF'];
                        return $current_p.'?path='.$path.'&pg='.$pg.'&pathm='.$pathm.'&pgm='.$pgm.'&multi=true';
                        break;

                default:
                    return $location.'?path='.$path.'&pg='.$pg;
                    break;
            }

        }

        public function Plugin_Permission_Set($perm)
        {

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if(isset($_SESSION['permission'])) {
                $permission = $_SESSION['permission'];
                $username = $_SESSION['username'];
            } else {
                $permission = 'unset';
            }

            if($perm == $permission || $perm == 'all') {
                return true;
            } else {
            return false;
            }
        }

        public function PushToDebuger($push_to, $content) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if(isset($_SESSION[$push_to])) {
                $array = $_SESSION[$push_to];
                $array[] = $content;
                unset($_SESSION[$push_to]);
                $array = array_unique($array, SORT_REGULAR);
                $_SESSION[$push_to] = $array;
            } else {

                $_SESSION[$push_to] = array($content);
                
            }
        }

        public function GetCurrentPage() {
            $page = $_SERVER['PHP_SELF'];
            $page = explode('/', $page);
            return $page = $page[0];
        }

        public function GetUrl($mode = ' ', $desired = ' ') {
            switch ($mode) {
                case 'desired':
                    $url =  "{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}{$_SERVER['REQUEST_URI']}";

                    if (!empty($desired)) {
                        $url = explode('/', $url);
                        if(in_array($desired, $url)) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }

                    break;
                
                default:
                    $url =  "{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}{$_SERVER['REQUEST_URI']}";
                    return $url;
                    break;
            }
        }

        public function CheckForGet($request)
        {
            if (isset($_GET[$request])) {
                return true;
            } else {
                return false;
            }
        }

        public function GetWebInfo()
        {   
            global $db;
            global $connect;

            if($connect == true) {
                $name = '';
                $logosrc = '';
                $date = '';

                $stmt = $connect->prepare("SELECT * FROM `fc_info`");
                $stmt->execute();
                $stmt->bind_result($name, $logosrc, $date);
                $stmt->store_result();
                $stmt->fetch();
                $stmt->close();

                return $info = array(
                    'web-name' => $name,
                    'logo-src' => $logosrc,
                    'date' => $date
                );

            } else {
                return 'Internal error';
            }
        }

        public function CSSLoaderURL($css, $themePathCSSFolder) {

            $url = __DOMAIN__;
            if(is_array($css)) {
                foreach($css as $load) {
                    echo '<link rel="stylesheet" href="http://'.$url.'/Assets/Themes/'.$themePathCSSFolder.'/'.$load.'">';
                }
            } else {
                echo '<link rel="stylesheet" href="http://'.$url.'/Assets/Themes/'.$themePathCSSFolder.'/'.$css.'">';
            }
        }

        public function JSLoaderURL($js, $themePathJSFolder) {

            $url = __DOMAIN__;
            if(is_array($js)) {
                foreach($js as $load) {
                    echo '<script src="http://'.$url.'/Assets/Themes/'.$themePathJSFolder.'/'.$load.'"></script>';
                }
            } else {
                echo '<script src="http://'.$url.'/Assets/Themes/'.$themePathJSFolder.'/'.$js.'"></script>';
            }
        }

        public function LoadBlocks($path, $prefix, $ext, $parentdiv)
        {
            $dirs = scandir($path);

            unset($dirs[0], $dirs[1]);

                foreach($dirs as $dir) {
                    foreach($files = glob("$path$prefix*$ext") as $file) {
                        $array[] = $file;
                    }
                }

                $array = array_unique($array, SORT_REGULAR);

                foreach ($array as $key) {
                    echo '<div class="'.$parentdiv.'">';
                    include $key;
                echo "</div>";
                }
        }
    }
?>