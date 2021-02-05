<?php require('include/config.php'); 
include("include/logincheck.php");
include_once("include/function.php");

$category = implode(',', $_POST['category']);


$query  = "SELECT * FROM sub_category WHERE category IN ('$category')";
$results = mysql_query($query);

?>
	<option value="">Select Sub category</option>
<?php
	while($state=mysql_fetch_array($results)){
?>
	<option value="<?php echo $state["name"]; ?>"><?php echo $state["name"]; ?></option>
<?php
	}

?>