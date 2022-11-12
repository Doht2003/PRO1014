<!-- dùng đểv kết nối cơ sở dữ liệu -->
<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=qoqwpetyhosting_pro1014;charset=utf8","qoqwpetyhosting_team8","Team8_FPoly");
        $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo"Lỗi kết nối". $e -> getMessage();
    }

?>