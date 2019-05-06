<?php
    if (!empty($_FILES))
    {
        
        //print_r($_FILES);
    
        if($_FILES['fileName']['size'] > 1000000)
        {
            $_SESSION['fileSize'] = "Error: File too large";
        }
        else
        {
            $_SESSION['fileSize'] = "";
            move_uploaded_file($_FILES['fileName']['tmp_name'], "gallery/" . $_FILES['fileName']['name']); 
        }
        
        
        
    }
    
     // returns all files names within folder

    //print_r($images);
    
    function displayImagesUploaded()
    {
        $images = scandir("gallery");
        
        echo "<div> " . $_SESSION['fileSize'] . " </div>";
        
        for ($i = 2; $i < count($images); $i++)
        {
            echo "<img src='gallery/".$images[$i] ."' width='100'> <br>";
        }
        
    } // end displayImagesUploaded()
    
    

?>

<!DOCTYPE html>
<html>
    <head>
        <title> File Upload</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <style>
            
            img { padding: 10px; }
            
            img:hover { width: 300px; }
            
        </style>
        
    </head>
    <body>
        
        <h1>File Upload</h1>
        
        <form method="POST" enctype="multipart/form-data"> 
        
            Select file: <input type="file" name="fileName" /> 
            
            <br/>
            
            <input type="submit"  name="uploadForm" value="Upload File" /> 
            
        </form>
        
        <hr>
        
        
        
        <h3>
            
            Images uploaded:
            
        </h3>
        
        <?= displayImagesUploaded() ?>


    </body>
</html>