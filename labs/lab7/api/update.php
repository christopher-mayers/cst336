<?php

    session_start();
    
    //checks whether user has logged in
    if (!isset($_SESSION['adminName']))
    {
        
        header('location: ../index.html'); // redirects to a new file named admin.php
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        
        <title> Ottermart - Update Product </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
    </head>
    <body>

        <h1> Update Product </h1>
        
        Enter Product Name: <input type="text" id = "productName"></input>
        
        <br></br>
        
        Enter Product Description: <textarea id = "productDescription" rows = "3" cols = "20"></textarea>
        
        <br></br>
        
        Enter Product Image: <input type = "text" id = "productImage">
        
        <br></br>
        
        Enter Product Price: <input type = "text" id = "productPrice">
        
        <br></br>
        
        Choose a category: 
        
        <select id = "productCategory">
            
            <option>Select One</option>
            
        </select>
        
        <br></br>
        
        <button id = "updateProduct">Update Product</button>
        
        <br></br>
        
        <div id = "message"></div>


    </body>
    
    <script>
        
        function getProductInfo()
        {
            $.ajax({

                type: "GET",
                url: "getProductInfo.php",
                dataType: "json",
                data:{"productId": <?=$_GET['productId']?>},
                success: function(data,status) 
                {
                  
                  $("#productName").val(data["productName"]);
                  $("#productDescription").val(data["productDescription"]);
                  $("#productImage").val(data["productImage"]);
                  $("#productPrice").val(data["productPrice"]);
                  $("#productCategory").val(data["catId"]).change();
                  
                  
                },
                complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
                }
                
            });//ajax
        }
        
        $.ajax({

            type: "GET",
            url: "../../lab6/api/getCategories.php",
            dataType: "json",
            success: function(data,status) {
              
              
              data.forEach(function(key){
                  $("#productCategory").append("<option value=" + key["catId"] + ">" + key['catName'] + "</option");
              })
              
              getProductInfo();
              
            },
            complete: function(data,status) { //optional, used for debugging purposes
            //alert(status);
            }
            
        });//ajax
        
        
        
        $("#updateProduct").on("click", function(){

            
            $.ajax({

                type: "GET",
                url: "updateProductAPI.php",
                dataType: "json",
                data: { "productName":         $("#productName").val(),
                        "productDescription":  $("#productDescription").val(),
                        "productImage":        $("#productImage").val(),
                        "productPrice":        $("#productPrice").val(),
                        "productCategory":     $("#productCategory").val(),
                        "productId":           <?=$_GET['productId']?>
                },
                success: function(data,status) {
                  
                  $("#message").html("Product Successfully Updated!");
                  
                },
                complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
                }
                
            });//ajax
            
            $("#message").html("Product Successfully Updated!");
            
        });
        
    </script>
    
</html>