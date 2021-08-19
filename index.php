<!DOCTYPE html>
<html>
    <head>
        <title>attendance</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="container vh-100">
            <div class="row justify-content-center h-100">
                <div class="card w-25 my-auto shadow">
                    <div class="card-header text-center bg-primary text-white">
                        <h2>Attendance</h2> 
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="rollno">Rollno</label>
                                <input type="rollno" id="rollno" class="form-control" name="rollno"/>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="name" id="name" class="form-control" name="name"/>
                            </div>
                            <div class="form-group">
                                <label for="subject">subject</label>
                                <select name="subject"  id="subject" class="form-control" name="subject">
                                    <option for="subject" name="subject" value="DataStructure(JL)" id="subject">Data Structure(JL)</option>
                                    <option for="subject" name="subject" value="Data Structure(SN)" id="subject">Data Structure(SN)</option>
                                    <option for="subject" name="subject" value="Python" id="subject">Python</option>
                                    <option for="subject" name="subject" value="TOC" id="subject">TOC</option>
                                    <option for="subject" name="subject" value="Sensors&Transducer" id="subject">Sensors&Transducer</option>
                                    <option for="subject" name="subject" value="Maths" id="subject">Maths(SH)</option>
                                    <option for="subject" name="subject"  value="Maths" id="subject">Maths(AB)</option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary w-100" value="submit" name="">
                        </form>
                    </div>
                    <div class="card-footer text-right">
                        <small>&copy; <b>Anas and Abhi</b></small>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
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