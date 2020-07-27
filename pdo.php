<?php
    function lay_customers(){
        // Create a new PDO instanace
        $pdo = new PDO('mysql:host=localhost;dbname=long', 'root', '');
        $stmt = $pdo->prepare('SELECT ten, ngay_sx FROM san_pham;');
        //Thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_ASSOC); // tra ve mang
        $stmt->execute(); // chay nhung van chua tra ve du lieu
        $customers = $stmt->fetchAll(); // tra ve du lieu mang
        return $customers;
    }
