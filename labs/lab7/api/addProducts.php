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
        
        <title>
            
            Ottermart - Add Product
            
        </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

        
    </head>
    
    <body>
        
        <h1>Add New Product</h1>
        
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
        
        <button id = "addProduct">Add Product</button>
        
        <br></br>
        
        <div id = 'totalProducts'></div>
        
    </body>
    
    <script>
        
        $.ajax({

            type: "GET",
            url: "../../lab6/api/getCategories.php",
            dataType: "json",
            success: function(data,status) {
              
              
              data.forEach(function(key){
                  $("#productCategory").append("<option value=" + key["catId"] + ">" + key['catName'] + "</option");
              })
            },
            complete: function(data,status) { //optional, used for debugging purposes
            //alert(status);
            }
            
        });//ajax
        
        $("#addProduct").on("click", function(){
            
            $.ajax({

                type: "GET",
                url: "addProductAPI.php",
                dataType: "json",
                data: { "productName":         $("#productName").val(),
                        "productDescription":  $("#productDescription").val(),
                        "productImage":        $("#productImage").val(),
                        "productPrice":        $("#productPrice").val(),
                        "productCategory":     $("#productCategory").val()
                },
                success: function(data,status) {
                  
                  $("#totalProducts").html(data.totalProducts + " total products in database.");
                  
                },
                complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
                }
                
            });//ajax
            
        });
        
    </script>
    
</html>

<?php

    

?>
