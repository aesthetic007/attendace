
<?php
    $rollno=$_POST['rollno'];
    $name=$_POST['name'];
    $subject=$_POST['subject'];
    
    // Database connection here
    $con = new mysqli('localhost','root','','test');
    if($con->connect_error){
        die("connection Failed : ".$con->connect_error);
    }else{ 
        $stmt=$con->prepare("insert into attendance(rollno,name,subject)
        values(?,?,?)");
        $stmt->bind_param("iss",$rollno,$name,$subject);
        $stmt->execute();
        echo "Attendance Succesful...";
        $stmt->close();
        $con->close();
    }
?>
