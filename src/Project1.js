function login() {
    //FormData 객체 생성하고 키-값 형식으로 추가해 줌
    var data = new FormData();
    data.append('email', document.getElementById("user-email").value);
    data.append('password', document.getElementById("user-pass").value);
    //HTTP request를 위한 객체 생성(새로운 url을 열고 request를 보낸다.)
    var xhr = new XMLHttpRequest();

    xhr.open('POST', "login-check.php", true);//true -> 비동기로 처리
    xhr.onload = function () {
        if (xhr.status == 200) {
            console.log(this.response);
            var response = JSON.parse(this.response);
            if (response.status) {
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
            console.log("서버를 연결하려면 관리자에게 말씀해주세요.");
        }
    };
    xhr.send(data);
    return false;
}