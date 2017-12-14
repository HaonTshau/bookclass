<?php

function onError($arg){
	//echo "</br> Back to gym.php in 3 seconds ... ";
	//$url = "gym.php" . $arg;
	//header("refresh: 3; url=$url");
	//exit;
}

//onError('?username=xxx&phone=2222');

// validate input data

//$username="user-xx";
//$username="user'xx";
//$username="user,xx";
$username=" user'xx";
$phone="0123456789";

$username = htmlspecialchars($username);
$phone = htmlspecialchars($phone);

$username = trim($username);
$phone = trim($phone);

//if ('' != $username){
	//$regex = '/^[a-zA-Z]+[\-\']{0,1}[a-zA-Z]+$/x';
	//$matches = array();
	//if (preg_match($regex, $username, $matches)){
		////var_dump($matches);
	//}else{
		//echo '<font color="red">Book failed: username not valid</font>';
		//onError('');
	//}
//}else{
	//echo '<font color="red">PLEASE input username</font>';
	//onError('');
//}

//if ('' != $phone){
	//$regex = '/0[0-9]{8,9}/';
	//$matches = array();
	//if (preg_match($regex, $phone, $matches)){
		////var_dump($matches);
	//}else{
		//echo '<font color="red">Book failed: phone/mobile not valid</font>';
		//onError('');
	//}
//}else{
	//echo '<font color="red">PLEASE input phone/mobile number</font>';
	//onError('');
//}

// check class has at least one place left
include 'config.php';
try {
	$dbh = new PDO('mysql:host=localhost;dbname=bookclass', MYSQLUSER, MYSQLPASS);
	$query = $dbh->prepare('SELECT * FROM course WHERE remain > 0');
	$query->execute();

	//while($row=$query->fetch(PDO::FETCH_OBJ)) {
		//[>its getting data in line.And its an object<]
		//echo $row->coursename;
					
	//}
	if (true){
		$insert = $dbh->prepare("INSERT INTO log (`courseid`, `name`, `phone`) VALUES ($courseid, '$username', '$phone')");
		unset($insert);
	}
	unset($dbh);
	unset($query);
} catch (PDOException $e){
	print "Error:" . $e->getMessage(). "<br/>";
	die();
}
