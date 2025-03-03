<?php
if(isset($_POST['submit']))
{
    $fn=$_POST['fname'];
    $ln=$_POST['lname'];
    echo"First Name =$fn<br>";
    echo"Last Name = $ln<br>";
}
?>