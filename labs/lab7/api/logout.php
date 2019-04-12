<?php

    session_start();
    
    session_destroy();
    
    header('location: ../index.php'); // redirects to a new file named admin.php

?>