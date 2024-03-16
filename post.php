<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Mbtkr";
    try{
        $nps = $_POST['nps'];
        $feedback = $_POST['feedback'];
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error){
            die("Connection Failed: " . $conn->connect_error);
        }
        
        $asset_type = 'Feedback';
        $nps = $conn->real_escape_string($_POST['nps']);
        $feedback = $conn->real_escape_string($_POST['feedback']);
        $asset_details = json_encode(['nps' => $nps, 'feedback' => $feedback]);
        
        $sql = "INSERT INTO Mbtkr_Table (Asset_type, Asset_Details) VALUES ('$asset_type', '$asset_details')";
        
        /*$sql = "insert into Mbtkr_Table (Asset_type, Asset_Details) values ('Feedback',array[cast('{'nps':$nps, 'feedback':$feedback}') as json]";
        $sql->execute();
        */
        $conn->query($sql);
        $conn->close();
    }
    catch(Exception $ex){
        echo "Error" . $ex->getMessage();
    }
    finally{
        if (isset($conn)) {
            $conn->close();
        }
    }
}
?>