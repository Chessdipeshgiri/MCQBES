<?php
$conn=new mysqli("localhost","root","","mcqbes");
if($conn->connect_error)
 {
 die("Connection Error");
}
$id= $_POST['id'];
$sql="SELECT * FROM test WHERE id='$id'";

if($r=$conn->query($sql))
{
    $data=array();
    while($row=$r->fetch_assoc())
    {
        array_push($data,$row);
    }
}
    echo json_encode($data);
?>