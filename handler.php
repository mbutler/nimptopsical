<?php


$digits = file_get_contents("digits.txt");

// Place each line of $digits into array
$numbers = explode("\n",$digits);


foreach ($numbers as $number)
   {
      
	  trim($number);
	  $phoneNumber = $number;
	  include 'send.php';
	  
   }




?>