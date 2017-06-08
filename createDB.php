<?php



//ifndef
require_once("/home/ps4ww/.mysqlpass.inc.php");
$servername = "localhost";
$username = "dbuser";
$sql = "";


//establish connection
//then make an sql string that will run querys to make tables
try {
	//$sql .="CREATE DATABASE fanhub;";

	$conn = new PDO("mysql:host=$servername;dbname=fanhub", $username, MySQLPassword::$password);
    // set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//$sql .= "USE fanhub;";

	//create table with courses
	$sql .= "CREATE TABLE users (
	firstname VARCHAR(40),
	lastname VARCHAR(40),
	password VARCHAR(40) NOT NULL,
	birthday DATETIME NOT NULL,
	email VARCHAR(255) NOT NULL,
	PRIMARY KEY (email)
	) ENGINE=InnoDB;";


	//in the database create a table with students
	$sql .="CREATE TABLE artists(
	stagename VARCHAR(40) NOT NULL,
	first VARCHAR(40) NOT NULL,
	last VARCHAR(40),
	birthday DATETIME NOT NULL,
	twitterid VARCHAR(40),
	description text,
	PRIMARY KEY (stagename)
	) ENGINE = InnoDB;";


	//in the database create a table with grades
	$sql .= "CREATE TABLE userfavorites ( 
	email VARCHAR(255) NOT NULL, 
	stagename VARCHAR(40) NOT NULL,
	birthday DATETIME, 
	PRIMARY KEY (email,stagename), 
	FOREIGN KEY (email) REFERENCES users(email),
	FOREIGN KEY (stagename) REFERENCES artists(stagename) ON DELETE CASCADE 
	) ENGINE = InnoDB;";

	//maybe add group here later if you have time


//make the data

	$sql .="INSERT INTO users (firstname,lastname,password,birthday, email) VALUES  ('Jongdae','Kim',sha1('iamchen'), now(), 'chenny21@exo.sm');";
	$sql .="INSERT INTO users (firstname,lastname,password,birthday, email) VALUES  ('Chanyeol','Park',sha1('ilovedogs'), now(), 'chanchan@exo.sm');";


    // use exec() because no results are returned
    //execute sql
	$conn->exec($sql);
	echo "Database created successfully<br>";
}
//sql fail fallback
catch(PDOException $e)
{
	echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>