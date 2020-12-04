<?php
    $host = $_POST['host'];
    $db = $_POST['db'];
    $dbp = $_POST['dbp'];
    $dbu = $_POST['dbu'];

    $connect = @mysqli_connect($host, $dbu, $dbp, $db);

    if(!$connect) {
        $response = array('Failed connectiong to database. Check if you gave vaild credentials',  '0');
        echo json_encode($response);
        exit();
    } 
    
    
    mysqli_close($connect);
    
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
    
    if(file_exists('../../Classes/DataBase/DataBase_info.config.php')) {
        $response = array('Successfuly connected to DataBase', '1');
        echo json_encode($response);
        exit();
    } else {
        $response = array('Error creating config file', '0');
        echo json_encode($response);
        exit();
    }
    ?>