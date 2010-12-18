<?php

include 'pickterm.php';


    /* check if message body is not blank and doesn't exceed allowable limit */

    $subject = "Ben Franklin sez:";

    $message = $drunkterm;



    if (empty($subject) && empty($message)) {

        exit("Message cannot be blank.");

    }



    // subject is wrapped in brackets and separated with a whitespace, so count for 3 extra characters

    $strlen_subject = ($subject != "") ? strlen($subject) + 3 : 0;

    $strlen_message = strlen($message);



    $express = 1;

    if ($express && ($strlen_subject + $strlen_message > 160)) {

        exit("In case of express delivery, message length should not exceed 160 characters.");

    }

    elseif ($strlen_subject + $strlen_message > 130) {

        exit("In case of standard delivery, message length should not exceed 130 characters.");

    }



    /* convert characters into a format that can be safely transmitted over the Internet */

    $subject = urlencode($subject);

    $message = urlencode($message);



    /* send message */

    $user = ""; /* change to your EZ Texting username */

    $password = ""; /* change to your EZ Texting password */



    $ch = curl_init("https://app.eztexting.com/api/sending");

    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&pass=$password&phonenumber=$phoneNumber&subject=$subject&message=$message&express=$express");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

    $data = curl_exec($ch);



    /* parse result of API call*/

    switch($data) {

        case 1:

            print("Thanks.  Look for a message around 9 on Friday night.  GET CRAMP’D, Y'ALL");

            break;

        case -1:

            print("Invalid user or password");

            break;

        case -2:

            print("Credit Limit Reached");

            break;

        case -5:

            print("Local Opt Out");

            break;

        case -7:

            print("Invalid Message");

            break;

        case -104:

            print("Globally Opted Out Phone Number");

            break;

        case -106:

            print("Incorrectly Formatted Phone Number");

            break;

        case -10:

            print("Unknown Error");

            break;

    }





?>

