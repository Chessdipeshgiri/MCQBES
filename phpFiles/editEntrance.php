<?php
$conn=new mysqli("localhost","root","","mcqbes");
if($conn->connect_error)
 {
 die("Connection Error");
}
$eid= $_POST['eid'];
$sql="SELECT * FROM entrance WHERE eid='$eid'";

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