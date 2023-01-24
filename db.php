<?php 

session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '123456',
    'php_mysql_crud'
);

// if(isset($conn)){
//     echo 'DB is connected';
// }

?>