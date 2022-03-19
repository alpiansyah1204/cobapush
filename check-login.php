<?php
  $server = "localhost";
  $user = "root";
  $pass = "";
  $database = "dblatihan1";

  $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
ob_start();
session_start();
require 'config.php';
if (isset($_SESSION['username']) ) {

    header('location:index.php');
    exit();
}
if ( isset($_POST['username']) && isset($_POST['password']) ) {
    
    $sql_check = "SELECT
                         
                         id_user 
                  FROM users 
                  WHERE 
                       username=? 
                       AND 
                       password=? 
                  LIMIT 1";

    $check_log = $dbconnect->prepare($sql_check);
    $check_log->bind_param('ss', $username, $password);
    $username = $_POST['username'];
    $password = md5( $_POST['password'] );

    $check_log->execute();

    $check_log->store_result();

    if ( $check_log->num_rows == 1 ) {
        $check_log->bind_result($id_user);

        while ( $check_log->fetch() ) {
            
            $_SESSION['user_id']    = $id_user;
            
            $_SESSION['username']   = $username;
            
        }

        $check_log->close();

        header('location:index.php');
        exit();

    } else {
        header('location: login.php?error='.base64_encode('Username dan Password Invalid!!!'));
        exit();
    }

   
} else {
    header('location:login.php');
    exit();
}

?>