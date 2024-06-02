<?php
    include 'deleteDbManager.php';
    if(!empty($_POST))
    {
        $id = checkinput($_POST['id']);
        Delete($id);
        header('Location: index2.php');
    }else{
        header('Location:index2.php');
    }


    function checkinput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlentities($data);
        return $data;
    }
?>