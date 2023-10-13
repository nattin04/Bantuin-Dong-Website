<?php
session_start();
$_SESSION['sesi'] = NULL;

include "koneksi.php";
    if( isset($_POST['submit']))
{
        $user   = isset($_POST['user']) ? $_POST['user'] : "";
        $pass   = isset($_POST['pass']) ? $_POST['pass'] : ""; 
        $qry    = mysqli_query($db, "SELECT * FROM tabel_admin WHERE username = '$user' AND password = '$pass'");
        $sesi   = mysqli_num_rows($qry);

if ($sesi == 1)
{
        $data_admin = mysqli_fetch_array($qry);
        $_SESSION['id_admin'] = $data_admin['id_admin']; 
        $_SESSION['sesi'] = $data_admin ['nama_admin'];

        echo "<script>
            alert('Welcome to Bantuin Dong');
            </script>";
            
        echo "<meta http-equiv='refresh' content='0;url=index.php?user=$sesi'>";
}
else
{
        echo "<meta http-equiv='referesh' content'=0;url=login.php'>";
        echo "<script>alert('anda gagal log in');</script>";
        include "login.php";
}


    }
    else
    {
    include "login.php";
}

?>