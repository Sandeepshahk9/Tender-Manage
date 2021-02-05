<?php require('include/config.php'); 
include("include/logincheck.php");
include_once("include/function.php");

$categoryid = $_REQUEST["categoryid"] ;

$query  = "SELECT * FROM sub_category WHERE category='".$categoryid."'";
$results = mysql_query($query);

?>
	<option value="">Select.....</option>
<?php
	while($state=mysql_fetch_array($results)){
?>
	<option value="<?php echo $state["name"]; ?>"><?php echo $state["name"]; ?></option>
<?php
	}

?>