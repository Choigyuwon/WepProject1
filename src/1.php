<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
</head>
<body>
<?php
//먼저 자바스크립트로부터 데이터가 제대로 전달 되는지 알아 보자
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];

//파일로 저장해 보자.
if(myEmail != null){
    $myFile = fopen("test.txt", "w");
    fwrite($myFile, $myEmail);
    fwrite($myFile, $myPassword);
    fclose($myFile);
}

//넘어 온 아이디와 패스워드를 인자로 정상적인 회원인지 검증 한다.
$pass = validateUser($_POST['email'], $_POST['password']);

if($pass){
    //회원인증 여부를 세션으로 저장(나중에 필요하면 사용)
    session_start();
    $_SESSION['user'] = $pass;
}

echo json_encode([
    "status" => $pass,
    "message" => $pass ? "OK" : "Invalid email/password"
]);

//회원인증절차
function validateUser($myEmail, $myPassword){
    //DB에서 사용자 정보를 쿼리해서 비교한다. 여기서는 생략...
    if($myEmail == "testman@gmail.com" && $myPassword == "1234"){
        return true;
    } else {
        return false;
    }
}
?>
</body>
</html>
