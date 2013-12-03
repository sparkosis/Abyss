<?php
$db = "127.0.0.1";
$db_user = "root";
$db_pass = "";
$db_name ="abyss";
$db_name_membres ="membres";

try

{
	$db_connect = new PDO('mysql:host='.$db.';dbname='.$db_name, $db_user, $db_pass);
	
} catch (Exception $e) 
{

	die("Erreur sql");
}

?>