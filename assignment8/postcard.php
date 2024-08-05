<?php
require_once "php/db_connect.php";
require_once "php/functions.php";

if(isset($_POST['name']) && isset($_POST['title']) && isset($_POST['text']))
{    
    $name = sanitizeString($db, $_POST['name']);
    $title = sanitizeString($db, $_POST['title']);
    $text = sanitizeString($db, $_POST['text']);
    $filter=$filter = sanitizeString($db, $_POST['hiddenfilter']);
    
    $time = $_SERVER['REQUEST_TIME'];
	$file_name = $time . '.jpg';

    if ($_FILES)
    {
        $tmp_name = $_FILES['upload']['name'];
        $dstFolder = 'users';
        move_uploaded_file($_FILES['upload']['tmp_name'], $dstFolder . DIRECTORY_SEPARATOR . $file_name);
       //echo "Uploaded image '$file_name'<br /><img src='$dstFolder/$file_name'/>";
    }

    SavePostToDB($db, $name, $title, $text, $time, $file_name, $filter);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
    
    <link rel="stylesheet" href="css/styles.css">
	
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div id="h_navcontainer">
    <ul>
     <!-- <li><a href="index.html">Contact</a></li>-->
      <li><a href="http://lamp.cse.fau.edu/~dconnelly2014/assignment8/postcard.php">Wall</a></li>
      <li><a href="http://lamp.cse.fau.edu/~dconnelly2014/assignment8">Post a Pic</a></li>
      <li><a href="">Home</a></li>
    </ul>
  </div>
    <title>Image sharing wall</title>
    <h1><center>Picture Wall</center></h1>
    <br></br>
    <div class="container">
        <?php echo getPostcards($db); ?>
    </div>
</body>


