<!DOCTYPE html>
<html lang="ko">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Choigyuwon site</title>
    <style>
        h1 {font-style : italic; font-size : x-large; color : snow;}
        html {text-align: center; background-image: url("login.PNG"); background-repeat : no-repeat;
            min-height: 100%;  background-position: center;
            background-size: cover;}
        p {font-style : revert; color : white;}
        label {font-style : revert; color : white;}
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
<form method = "post" id="login-form" onsubmit="return login()" action = "/yy/join.php">
    <h2><span style = color:white>Sign Up</span></h2>
    <label>ID<span id = "ids"></span></label>
    <input type="text" name="id" id="id1" onkeyup="idcheck()">
    <input type="hidden" id="idh">
    <p>PASSWORD</p><input type="text" name="pw"onkeyup="pwcheck(this.value)">
    <p>PASSWORD CHECK</p><input type="text" name="pwcheck"onkeyup="pwcheck2(this.value)">
    <p>NAME</p><input type="text" name="name"onkeyup="namecheck">
    <p>EMAIL</p><input type="text" name="email"onkeyup="emailcheck">
    <input type="submit" value="Join" onclick="check()">
</form>

<p><span style=color:white>문의 gw2988@naver.com or 강릉원주대학교 컴퓨터공학과</span></p>
<script>
    function idcheck(){
        var idc = document.getElementByld("id1").value.replace(/[^a-z0-9_-]/g,"");
        document.getElementByld("id1").value=idc;
        var obj, dbParam, xmlhttp, myObj, x;
        obj = {"table":"member","id":idc};
        dbParam = JSON.stringify(obj);
        xmlhttp = new XMLHttpRequest();//서버데이터요청한것을 변수에저장
        xmlhttp.onreadystatechange = function(){//xml객체가 변할때마다 함수를 호출한다.
            if(this.readyState == 4 && this.status == 200){
                myObj = JSON.parse(this.reponseText);//객체값으로 바꿔서 myobj변수에 저장
                for(x in myObj){//객체의 배열만큼 반복
                    if(myObj[x] == '1'){//전송받은 값이 1이면
                        document.getElementByld("ids").innerHTML = "아이다가 존재합니다.";
                        document.getElementByld("idh").value="";
                    }else{
                        document.getElementByld("ids").innerHTML = "사용할 수 있는 아이디 입니다.";
                        document.getElementByld("idh").value="1";
                    }

                }
            }

        };
        xmlhttp.open("POST","idcheck.php",true);//데이터베이스사용할수있게해주는 공식 이하.
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("content="+dbParam);
    }
    function pwcheck(){
    }
    function pwcheck2(){
    }
    function name(){
    }
    function emailcheck(){
    }
</script>
</body>
</html>

