<?php
// Define configfile path
$db_config_file = "/data/db.php";
//
if (file_exists($db_config_file)) {
	// include config file if we have found it
	require_once($db_config_file);
	$using_config_file = "yes";
	echo("yes");
} else {
	// If file isn't there, we'll assume you want env vars
	$host = getenv("MYSQL_SERVICE_HOST");
	$port = getenv("MYSQL_SERVICE_PORT");
	$db_name = getenv("MYSQL_DATABASE");
	$username = getenv("MYSQL_USER");
	$password = getenv("MYSQL_PASSWORD");
	$using_config_file = "no";

	echo("no");
	echo(var_dump(getenv("MYSQL_SERVICE_HOST"), getenv("MYSQL_SERVICE_PORT"), getenv("MYSQL_DATABASE"), getenv("MYSQL_USER"), getenv("MYSQL_PASSWORD")));
	echo(var_dump($using_config_file));
}

try {
	$con = new PDO("mysql:host={$host};dbname={$db_name};port={$port}", $username, $password);
}

// to handle connection error
catch(PDOException $exception){
	echo "Connection error xx: " . $exception->getMessage();
}
?>
