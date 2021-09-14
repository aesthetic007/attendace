<?php
if(isset($_POST['rollno'])|| isset($_POST['name']) || isset($_POST['subject']))
{

    $rollno=$_POST['rollno'];
    $name=$_POST['name'];
    $subject=$_POST['subject'];
{

    // Database connection here	
    $con = new mysqli('localhost','id17453594_attendance','E\#1V=Ie-\??db!?','id17453594_test');
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
}
}
?>
<?php
include "display.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <title>attendance</title>
        <link rel="stylesheet" type="text/css" href="css/boot.s">
        <style>
            
  .btn{
  position:absolute;
  top:5%;
  left:3%;
  width: 10%;
  }
  
      position:center;
      top:100%;
      left:10%;

table{ 
      position:;
    top:30%; 
    left:50%; 
   transform:translate(-50%,-30%);
    width:800px; 
    height:200px; 
    background-image:linear-gradient(to right,#e0eafc,#cfdef3); 
    border:1px solid #bdc3c7;    
    box-shadow:2px 2px 12px rgba(0,0,0,0,2),-1px-1px 8px rgba(0,0,0,0,2);
      
}

tr{ 
    transition:all .2s ease-in;
    cursor:pointer; 
    background:yellow;
}
th,td{ 
    padding:12px; 
    text-align:center; 
    border-bottom:1Px solid#ddd;
    background:#16a085;
}
td{ 
    background:white; 
}
tr:hover{ 
    background-color:#f5f5f5;
    transform:scale(1.02); 
    box-shadow:2px 2px 12px rgba(0,0,0,0,2), -1px -1px 8px rgba(0,0,0,0,2);
} 

            
        </style>
        <script>
            if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }
            </script>
<script>
function printPage() {
  window.print();
}
</script>
    </head>
    <body bgcolor="white">
        <div class="tb">
        <table id="tb" align="center" border=1px style="width: 800px; line: height 40px;">
            <tr>
                
                <th colspan="5"><center><h2>Student Details</h2></center></th>
            </tr>
            <tr>
                
                <th>Rollno</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Date&Time</th>
                <th>Delete</th>
            </tr>
      <?php

include "display.php"; // Using database connection file here

$records = mysqli_query($db,"SELECT * FROM `attendance`"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['rollno']; ?></td>
    <td><?php echo $data['name']; ?></td>
    <td><?php echo $data['subject']; ?></td>
    <td>
    <?php echo $data['date&time']; ?></td>    
    
    <td><a href="delete.php?rollno=<?php echo $data['rollno']; ?>">Delete</a></td>
  </tr>	
<?php
}
?>    
        </table>
</div>
   <div class="btn"> 
<input type="button" id="button" value="Print" onclick="printPage()" />
</div>
 </body>
</html>

            
