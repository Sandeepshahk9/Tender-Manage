<?php 

   require('include/config.php'); 

   $q = $_GET['q'];
if(isset($q) && !empty($q)) {
    
	
    $query = "SELECT id, name ,email FROM member WHERE name LIKE '$q%'";
    $result = mysql_query($query);
    $res = array();
    while($resultSet = mysql_fetch_array($result)) {
     $res[$resultSet['id']] = $resultSet['email'];
    }
    if(!$res) {
        $res[0] = 'Not found!';
    }
    echo json_encode($res);
}




?>