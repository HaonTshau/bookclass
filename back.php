<?php

function onError($arg){
	echo "</br> Back to gym.php in 3 seconds ... ";
	$url = "gym.php" . $arg;
	header("refresh: 3; url=$url");
	exit;
}

//onError('?username=xxx&phone=2222');

// validate input data
$course = $_POST['course'];
$time = $_POST['time'];
$username = $_POST['username'];
$phone = $_POST['userphone'];

//$username="user-xx";
//$username="user'xx";
//$username="user,xx";
//$username=" user'xx";
//$phone="0123456789";

$username = htmlspecialchars($username);
$phone = htmlspecialchars($phone);

$username = trim($username);
$phone = trim($phone);

if ('' == $course){
	echo '<font color="red">Book Failed: class not selected</font>';
	onError('?course=' . $course . '&username=' .  $username . '&time=' . $time .'&userphone=' . $phone);
}

if ('' == $time){
	echo '<font color="red">Book Failed: time not selected</font>';
	onError('?course=' . $course . '&username=' .  $username . '&time=' . $time .'&userphone=' . $phone);
}

if ('' != $username){
	$regex = '/^[a-zA-Z]+[\-\']{0,1}[a-zA-Z]+$/x';
	$matches = array();
	if (preg_match($regex, $username, $matches)){
		//var_dump($matches);
	}else{
		echo '<font color="red">Book Failed: username not valid</font>';
		onError('?course=' . $course . '&username=' .  $username . '&time=' . $time .'&userphone=' . $phone);
	}
}else{
	echo '<font color="red">PLEASE input username</font>';
	//onError('');
	onError('?course=' . $course . '&username=' .  $username . '&time=' . $time .'&userphone=' . $phone);
}

if ('' != $phone){
	$regex = '/0[0-9]{8,9}/';
	$matches = array();
	if (preg_match($regex, $phone, $matches)){
		//var_dump($matches);
	}else{
		echo '<font color="red">Book Failed: phone/mobile not valid</font>';
		//onError('');
		onError('?course=' . $course . '&username=' .  $username . '&time=' . $time .'&userphone=' . $phone);
	}
}else{
	echo '<font color="red">PLEASE input phone/mobile number</font>';
	//onError('');
	onError('?course=' . $course . '&username=' .  $username . '&time=' . $time .'&userphone=' . $phone);
}

// check class has at least one place left
include 'config.php';
try {
	$dbh = new PDO('mysql:host=localhost;dbname=bookclass', MYSQLUSER, MYSQLPASS);
	$query = $dbh->prepare("SELECT * FROM course WHERE remain > 0 AND coursename = '$course' AND coursetime = '$time'");
	$query->execute();

	//while($row=$query->fetch(PDO::FETCH_OBJ)) {
		//[>its getting data in line.And its an object<]
		//echo $row->coursename;
					
	//}
	$row = $query->fetch(PDO::FETCH_OBJ);
	if ($row){
		$update = $dbh->prepare("UPDATE course SET remain = remain - 1 WHERE remain > 0 AND coursename = '$course' AND coursetime = '$time'");
		$update->execute();
		unset($update);

		$insert = $dbh->prepare("INSERT INTO log (`courseid`, `name`, `phone`) VALUES ($row->id, '$username', '$phone')");
		$insert->execute();
		unset($insert);
		
		echo "<font color=\"red\">Book Success: class info - $course, $time</font>";
	}else{
		echo '<font color="red">Book Failed: NO place left</font>';
		//onError('');
		onError('?course=' . $course . '&username=' .  $username . '&time=' . $time .'&userphone=' . $phone);
	}
	unset($dbh);
	unset($query);
} catch (PDOException $e){
	echo "Error:" . $e->getMessage(). "<br/>";
	die();
}
