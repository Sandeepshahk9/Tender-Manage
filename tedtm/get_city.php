<?php require('include/config.php'); 

include_once("include/function.php");

$state = $_REQUEST["stateid"] ;

$query  = "SELECT * FROM city WHERE stateid='".$state."'";
$results = mysql_query($query);

?>
	<option value="">Select City</option>
<?php
	while($state=mysql_fetch_array($results)){
?>
	<option value="<?php echo $state["id"]; ?>"><?php echo $state["city"]; ?></option>
<?php
	 }

  ?>