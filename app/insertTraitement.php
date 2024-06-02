<?php 
    include 'insertDbManager.php';
    function checkinput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;         
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $name = checkinput($_POST['name']);
        $description = checkinput($_POST['description']);
        $price = checkinput($_POST['price']);
        $categorie = checkinput($_POST['categorie']);
        $image = $_FILES['image']['name'];
        $imagepath = '../assets/images/' . basename($image);
        $imageExtension = pathinfo($imagepath, PATHINFO_EXTENSION);
        $isSuccess = true;
        $message = "";
        $isUpload = false;
        if(empty($name))
        {
            $message.= " This field can't be empty";
            $isSuccess = false;
        }
        if(empty($description))
        {
            $message = " This field can't be empty";
            $isSuccess = false;
        }
        if(empty($price))
        {
            $message = "This field can't be empty";
            $isSuccess = false;
        }
        if(empty($categorie))
        {
            $message = "This field can't be empty";
            $isSuccess = false;
        }
        if(empty($image))
        {
            $message = "This field can't be empty";
            $isSuccess = false;
        }
        else{
            $isUpload = true; 
            if ($imageExtension != 'jpg' && $imageExtension != 'png' && $imageExtension != 'jpeg' && $imageExtension != 'gif') {
                $message = 'Les fichiers autorisés sont: .jpg .jpeg. .png .gif';
                $isUpload = false;
            }
            if(file_exists($imagepath))
            {
                $message= 'Le fichier xiste deja';
                $isUpload = false;
            }
            if($_FILES['image']['size']>5000000)
            {
                $message = 'Le fichier ne doit pas depasser les 500KB0';
                $isUpload = false;
            }
            if($isUpload)
            {
                if(!move_uploaded_file($_FILES['image']['tmp_name'], $imagepath))
                {
                    $message = "Il y a eu une erreur lors de l'upload";
                    $isUpload = false;
                }
            }
        }
        if($isSuccess && $isUpload)
        {
             insert($name, $description, $price, $categorie, $image);
             header('Location: index2.php');
        }else{
            header('Location:insert.php?message='.$message);
        }
    }










?>
 