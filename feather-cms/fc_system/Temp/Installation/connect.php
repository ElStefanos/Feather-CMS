<?php
    use mysqli;
    $host = $_POST['host'];
    $db = $_POST['db'];
    $dbp = $_POST['dbp'];
    $dbu = $_POST['dbu'];

    $file = fopen('../../Classes/DataBase/DataBase_info.config.php', 'w');
    fwrite($file, '<?php'.PHP_EOL.'class Database_Info {'.PHP_EOL.'protected $db_host = "'.$host.'";'.PHP_EOL.'protected $db_name = "'.$db.'";'.PHP_EOL.'protected $db_user = "'.$dbu.'";'.PHP_EOL.'protected $db_password = "'.$dbp.'";'.PHP_EOL.'}'.PHP_EOL.'?>');
    fclose($file);

    $conn = new mysqli($host, $dbu,  $dbp, $db);

    $query = '';
    $sqlScript = file('fc_development.sql');
    foreach ($sqlScript as $line)	{
        
        $startWith = substr(trim($line), 0 ,2);
        $endWith = substr(trim($line), -1 ,1);
        
        if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
            continue;
        }
            
        $query = $query . $line;
        if ($endWith == ';') {
            mysqli_query($conn,$query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
            $query= '';		
        }
    }
?>