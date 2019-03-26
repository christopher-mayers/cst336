<?php

    $books = array("Harry Potter and the Sorcerer's Stone by J.K. Rowling", "Brisingr by Christopher Paolini", "The Lord of the Rings: The Two Towers by J. R. R. Tolkien", "Dune by Frank Herbert", "Brave New World by Aldous Huxley");

    $returnBook = array();
    
    $searchBook = $_GET['bookName'];
    
    for($i = 0; $i<5; $i++)
    {
        $pos = stripos($books[$i], $searchBook);
        
        if ($pos === false)
        {
            
        }
        else
        {
            $returnBook['title']=$books[$i];            
        }

    }
    
    echo json_encode($returnBook);

?>