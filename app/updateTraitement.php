<?php 
    include 'updateDbManager.php';
    if(!empty($_GET['id']))
    {
        $id = checkinput($_GET['id']);
    }
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
            $isImgUpdated = false;
        }
        else{
            $isImgUpdated =true;
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
        if(($isSuccess && $isImgUpdated && $isUpload) || ($isSuccess && !$isImgUpdated))
        {
            if($isImgUpdated)
            {
                 UpdateIfImgUpdated($name, $description, $price, $categorie, $image, $id);
            }
            else{
                UpdateIfNotImgUpdated($name, $description, $price, $categorie, $id);
            }
        
            header('Location:index2.php?message='.$message);
        }elseif($isImgUpdated && !$isUpload){
           $select = Select($id);
           $image = $select['image'];
        }
    }else{
        $data = Select($id);
        $name =  $data['name'];
        $description = $data['description'];
        $price = $data['price'];
        $categorie = $data['category'];
        $image = $data['image'];
    }
    









?>
 