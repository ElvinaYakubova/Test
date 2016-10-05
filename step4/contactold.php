<?php
    if((isset($_POST['message'])&&$_POST['message']!="")&&(isset($_POST['email'])&&$_POST['email']!="")&&(isset($_POST['name'])&&$_POST['name']!="")){ 
        $message = $_POST['message'];
        $to = 'elvinayakubova@gmail.com';
        $from = $_POST['email'];
        $subject = $_POST['subject'];
        $headers = 'From: $from\r\n
                    Reply-to: $from\r\n 
                    Content-type: text/plain;
                    charset=utf-8\r\n';
        // mail($to, $subject, $message, $headers);
        if (mail($to, $subject, $message, $headers)) $result = 1;
        else $result = 0;
    }
    else $result = -1;
    echo getAnswer($result);

    function getAnswer($result) {
        switch($result) {
            case -1: $answer = "<p>Please fill all fields</p>";
            break;
            case 0: $answer = "<p>There is an error, try again</p>";
            break;
            case 1: $answer = "<p>Message sent successfully</p>";
            break;
        }
        return $answer;
    }
?>