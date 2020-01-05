<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">

</head>
<body>
<?php
$password = $_GET["password"];
$email = $_GET["email"];
if($password == "123456" && $email == "gw2988@naver.com")
{
    echo "로그인완료";
}
else
{
    echo "확인해주세요";
}


?>
</body>
</html>