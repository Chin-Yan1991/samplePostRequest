<?php
    header("Access-Control-Allow-Origin : * ");
    header("Access-Control-Allow-headers : * ");
    if(isset($_POST) && !empty($_POST)){
        //hardcoded

        if($_POST["username"] == "user123@hotmail.com" && $_POST["password"] == "password@123"){
            echo json_encode([
                'code'=>200, 
                'message'=>'logged in successfully', 
                "data"=>[
                    "userid"=> "user/123-abc"
                ]
            ]);
        }else{
            echo json_encode([
                'code'=>401, 
                'error'=>'Unauthorized',
                "data"=>[
                    "username" => $_POST["username"],
                    "password" => $_POST["password"],
                ],
            ]);
        }

        // var_dump($_POST);
    }else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p> hardcoded username : user123@hotmail.com </p>
<p> hardcoded password : password@123 </p>
    <form action="javascript:void(0);" id="webfrom">
        <input type="text" id="username" name="username" placeholder="username"/>
        <input type="password" id="password" name="password" placeholder="password"/>
        <button onclick="login()">submit</button>
    </form>
</body>
<script>
    const login = async () => {
        const payload = `username=${document.querySelector("#username").value}&password=${document.querySelector("#password").value}`;
        
        const XHR = new XMLHttpRequest();
        XHR.open("POST","http://127.0.0.1:8989",true);
        XHR.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
        XHR.onreadystatechange = () => {
            if(XHR.readyState == 4 && XHR.status == 200){
                const response = XHR.responseText;
                //console.log(response);
                
                const data = JSON.parse(response);
                if(data.code == 200){
                    sessionStorage.setItem("userid", data.data.userid);
                    window.location = "http://127.0.0.1:8989/loggedIn.php"
                }else{
                    console.log(data)
                    alert(`Error ${data.code} : ${data.error}`);
                }
            }
        }
        XHR.onerror = () => { 
            alert(`Network Error`);
        };
        XHR.send(payload);

    }
</script>
</html>
<?php } ?>