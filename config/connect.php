<?php

$db=mysqli_connect("localhost", "root", "","homefeast");

if(!$db)
{
    echo "database not connected";
}

else{
    echo "database connected";
}

