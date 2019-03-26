<?php

    $bookToAdd = $_GET['bookName'];
    $book0 = $_GET['book0'];
    $book1 = $_GET['book1'];
    $book2 = $_GET['book2'];
    $book3 = $_GET['book3'];
    $book4 = $_GET['book4'];
    
    $validBookAdd = array();

    if ($bookToAdd === $book0 || $bookToAdd === $book1 || $bookToAdd === $book2 || $bookToAdd === $book3 || $bookToAdd === $book4)
    {
        $validBookAdd['valid'] = "false";
    }
    else
    {
        $validBookAdd['valid'] = "true";
    }

    echo json_encode($validBookAdd);

?>