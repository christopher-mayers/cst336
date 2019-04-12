<!DOCTYPE html>
<html>
    <head>
        <title> Ottermart - Product Information </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    </head>
    <body>

        <h2 id="productName">
            
            
            
        </h2>
        
        <h3 id="productDescription">
            
            
            
        </h3>

        <img src="" id="productImage" width="200">
        
        <div id="productPrice">
            
            
            
        </div>

    </body>
    
    <script>
        
        $.ajax({

            type: "GET",
            url: "getProductInfo.php",
            dataType: "json",
            data:{"productId": <?=$_GET['productId']?>},
            success: function(data,status) 
            {
              
              $("#productName").html(data["productName"]);
              $("#productDescription").html(data["productDescription"]);
              $("#productImage").attr("src", data["productImage"]);
              $("#productPrice").html(data["productPrice"]);
              
              
            },
            complete: function(data,status) { //optional, used for debugging purposes
            //alert(status);
            }
            
        });//ajax
        
    </script>
    
</html>