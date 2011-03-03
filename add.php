<?php

if (!empty($_POST))

{


    /* check if phone number is valid */

    $phoneNumber = $_POST["phoneNumber"];

    if (empty($phoneNumber)) {

        exit("Phone number cannot be blank.");

    }

    if (strlen($phoneNumber) != 10) {

        exit("Invalid phone number. Phone number length should be 10 digits.");

    }

    if (!is_numeric($phoneNumber)) {

        exit("Invalid phone number. Phone number should contain only digits.");

    }

}

$digits= "digits.txt";
$fh = fopen($digits, 'a') or die("can't open file");
fwrite($fh, $phoneNumber . "\n");
fclose($fh);
echo "Added, thanks.  Look for a message around 9 every Friday night.  GET CRAMP'D, Y'ALL.  email me if you want off this crazy train.";




?>
