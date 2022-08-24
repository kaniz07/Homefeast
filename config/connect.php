<?php

$connection=mysqli_connect("localhost", "root", "","homefeast");

if(!$connection)
{
    echo "database not connected";
}

else{
    echo "database connected";
}
?>
