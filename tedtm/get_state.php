<?php require('include/config.php'); 
include("include/logincheck.php");
include_once("include/function.php");

$country = $_REQUEST["countryid"] ;


$query  = "SELECT * FROM state WHERE countryid='".$country."'";
$results = mysql_query($query);

?>
	<option value="">Select State</option>
<?php
	while($state=mysql_fetch_array($results)){
?>
	<option value="<?php echo $state["id"]; ?>"><?php echo $state["statename"]; ?></option>
<?php
	  }

?>