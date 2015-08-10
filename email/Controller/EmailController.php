<?php
    $msg = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $to = $_POST['to'];
        $from = $_POST['from'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        
        $helper = new MailHelper();
        
        try {
            $helper->sendEmail($to, $from, $subject, $message, 'genialdn92@gmail.com', 'huychaudn');
            
            $msg = "Email da gui thanh cong!";
        }
        catch (Exception $exc) {
            $msg = $exc->getMessage(); 
        }
    }
?>