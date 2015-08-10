<?php
    require_once 'Mail.php';
    require_once 'Mail/RFC822.php';
    
    class MailHelper {
        public function sendEmail($to, $from, $subject, $body, $username, $password, $is_body_html = true) {
            $smtp = array();
            
            $smtp['host'] = "ssl://smtp.gmail.com";
            $smtp['port'] = 465;
            $smtp['auth'] = true;
            $smtp['username'] = $username;
            $smtp['password'] = $password;
            
            $mailer = Mail::factory('smtp', $smtp);
            
            if (PEAR::isError($mailer)) {
                throw new Exception('Khong the tao mot mail moi!');
            }
            
            $recipients = array();
            $recipients[] = $to;
            
            $header = array();
            $header['From'] = $from;
            $header['To'] = $to;
            $header['Subject'] = $subject;
            
            if ($is_body_html) {
                $header['Content-Type'] = 'text/html';
            }
            
            $result = $mailer->send($recipients, $header, $body);
            
            if (PEAR::isError($result)) {
                throw new Exception('Loi khong the gui mail: '.htmlspecialchars($result->getMessage()));
            }
        }
        
        public function isValidEmail($email) {
            $pattern = '/(.+\<\w+\@\w+\.\w+\>)|(\w+\@\w+\.\w+)/';
            
            return preg_match($pattern, $email);
        }
    }
?>