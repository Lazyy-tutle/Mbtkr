<?php
php -S localhost:8000
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Mbtkr";
    
    $nps = $_POST['nps'];
    $feedback = $_POST['feedback'];
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
    }
    $sql = "insert into Mbtkr_Table (Asset_type, Asset_Details) values ('Feedback',array[cast('{'nps':$nps, 'feedback':$feedback}') as json]";
    $sql->execute();
    if($sql->affected_rows < 0){
        window.alert("Error");
    }
    $sql->close();
    $conn->close();
}
?>