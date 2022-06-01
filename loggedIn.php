<script>
    const userid = sessionStorage.userid;
    if(userid!='user/123-abc'){ 
        alert(userid)
        console.log("sessionStorage",sessionStorage)
        //window.location = "http://localhost:8989"; 
    }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    welcome, <script>document.write(userid)</script>
    <button onclick="logout()">logout</button>
</body>
</html>
<script>
    const logout = () => {
        sessionStorage.clear();
        window.location = "http://127.0.0.1:8989"
    }
</script>

