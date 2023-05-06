<?php

$conn = mysqli_connect('localhost', 'wokolndo_headturner_user', 'headturners09', 'wokolndo_headturner_db');

if(!$conn)
{
    die("Connection failed: ". mysqli_connect_error());
}
else
{
    // echo "Successfully Connected !";
}
