<?php

    include 'api/dbConnection.php';
    $conn = getDatabaseConnection("c9");

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Favorite Images</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
    </head>
    <body>

        <h1>Favorite Images</h1>
        
        <div id = "keywords">
            
            
            
        </div>
        
        <div id="images">
            
            
            
        </div>

    </body>
    
    <script>
    
        /*global $*/
        
        var action = "keyword";
        var url = "";
        var keyword = "";
        
        $.ajax({

                method: "GET",
                url: "api/favoriteAPI.php",
                dataType: "JSON",
                data: { "action": action,
                        "url": url,
                        "keyword":keyword
                },
                success: function(data,status) 
                {
                    
                    
                    
                    data.forEach(function(key){
                        
                        $("#keywords").append("<strong><span style='color: blue; padding: 10px;'class='word' name='" +key['keyword'] + "'>"+key['keyword'] + "</strong></span>");
                    
                    });
                    
                    $("#keywords").append("<br></br>");
                    
                
                },
                complete: function(data,status) 
                { 
                    
                    //optional, used for debugging purposes
                    //alert(status);
                
                }
            
            });//ajax
            
        
        $("#keywords").on("click",".word", function(){
            
            action = "favorites";
            keyword = $(this).attr("name");
            
            $("#images").html("");
            
            $.ajax({

                method: "GET",
                url: "api/favoriteAPI.php",
                dataType: "JSON",
                data: { "action": action,
                        "url": url,
                        "keyword":keyword
                },
                success: function(data,status) 
                {
                    
                    data.forEach(function(key){
                        
                        $("#images").append("<img style='padding: 10px;' src=" + key['imageURL'] + " >");
                    
                    });
                    
                
                },
                complete: function(data,status) 
                { 
                    
                    //optional, used for debugging purposes
                    //alert(status);
                
                }
            
            });//ajax
            
            
        });
            
        
        
    </script>
    
</html>