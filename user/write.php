<?php

$db ="hood";
$dbuser ="root";
$dbpassword = "";
$dbhost="localhost";
$return["error"] = false;
$return["message"]= "";
$link = mysqli_connect($dbhost,$dbuser,$dbpassword,$db);

$val = isset($_POST["name"]) && isset($_POST["email"])
&& isset($_POST["number"]) && isset($_POST["carChoice"]) && isset($_POST["carColor"]) && isset($_POST["carPlate"])&& isset($_POST["UID"]);
if($val){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $carChoice = $_POST["carChoice"];
    $carColor = $_POST["carColor"];
    $carPlate = $_POST["carPlate"];
    $UID = $_POST["UID"];
}

if ($return["error"]== false && strlen($name) < 3){
    $return["error"] = true;
    $return["message"] = "Enter name upto 3 characters";

}
//more validations
if($return["error"]==false){
    $name = mysqli_real_escape_string($link,$name);
    $email = mysqli_real_escape_string($link,$email);
    $number = mysqli_real_escape_string($link,$number);
    $carChoice = mysqli_real_escape_string($link,$carChoice);
    $carColor = mysqli_real_escape_string($link,$carColor);
    $carPlate = mysqli_real_escape_string($link,$carPlate);
    $UID = mysqli_real_escape_string($link,$UID);

    $sql = "INSERT INTO signup SET
      name = '$name',
      
      number = '$number',
      email = '$email',
      password = '$password',
      

      ";

$res = mysqli_query($link,$sql);
if ($res){
    echo "Success";
}
else{
    $return["error"]= true;
    $return["message"]="Dtabase Error";

}


}
mysqli_close($link);
header('Content-Type: application/json');

echo json_encode($return);




?>