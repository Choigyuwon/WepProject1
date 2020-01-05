<!DOCTYPE html>
<html lang="ko">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Choigyuwon site</title>
    <style>
        h1 {font-style : italic; font-size : x-large; color : snow;}
        html {text-align: center; background-image: url("login.PNG"); background-repeat : no-repeat;background-size: contain
            min-height: 100%;  background-position: center;
            background-size: cover;}
        p {font-style : revert;}
        #login-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background: #000000;
        }
        #login-form h1 {
            margin: 0 0 10px 0;
        }
        #login-form input{
            box-sizing: border-box;
            width: 100%;
            margin: 10px;
            padding : 10px;
        }
        #login-form input[type=submit]{
            border:1px solid brown;
            border-radius: 6px;
            background: #fffafa;
        }
    </style>
</head>
<body>


<h1><span style = "background-color : #000000 ">choigyuwon site home</span></h1>
<form id="login-form" onsubmit="return login()" action = "1.php">
    <h2><span style = color:white>LOGIN</span></h2>

    <input type="email" placeholder="Email Address" id="user-email" required>
    <input type="password" placeholder="Password" id="user-pass">
    <input type="submit" value="Login">
</form>
<p><span style=color:white>문의 gw2988@naver.com or 강릉원주대학교 컴퓨터공학과</span></p>
<script>
    function login(){
        //FormData 객체 생성하고 키-값 형식으로 추가해 줌
        var data = new FormData();
        data.append('email', document.getElementById("user-email").value);
        data.append('password', document.getElementById("user-pass").value);
        //HTTP request를 위한 객체 생성(새로운 url을 열고 request를 보낸다.)
        var xhr = new XMLHttpRequest();
        xhr.open('POST', "login-check.php", true);//true -> 비동기로 처리
        xhr.onload = function() {
            if(xhr.status == 200) {
                console.log(this.response);
                var response = JSON.parse(this.response);
                if(response.status){
                    console.log("로그인 되었습니다.");
                    //로그인 후 이동 페이지
                    location.href = "example05.html";
                } else {
                    console.log("일치하는 회원정보가 없습니다.");
                    alert("회원정보가 없습니다.");
                    //페이지 리셋
                    document.getElementById("login-form").reset();
                    document.getElementById("user-email").focus();
                }
            } else {
                console.log("SERVER ERROR");
            }
        };
        xhr.send(data);
        return false;
    }
</script>
</body>
</html>

