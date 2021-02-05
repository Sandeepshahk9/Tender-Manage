<?php 

   require('include/config.php'); 

$q = $_REQUEST['q'];
if(isset($q) && !empty($q)) {
    
	
     $query = "SELECT id, name FROM company WHERE name LIKE '%$q%'";
    $result = mysql_query($query);
    $res = array();
    while($resultSet = mysql_fetch_array($result)) {
     $res[$resultSet['name']] = $resultSet['name'];
    }
    if(!$res) {
        $res[0] = 'Not found!';
    }
     echo json_encode($res);
}

?>