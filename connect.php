<?php

$conn = mysqli_connect('localhost', 'root', '', 'wokolndo_headturner_db');

if(!$conn)
{
    die("Connection failed: ". mysqli_connect_error());
}
else
{
    // echo "Successfully Connected !";
}
