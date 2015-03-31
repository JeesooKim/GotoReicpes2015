<?php  include "c:/xampp/htdocs/GotoReicpes2015/config.php";  ?>

<?php include PATH_HEADER;  ?>  
<!--end top-->

<!--  Email the contact us form -->
<?php

$name="";
$email="";
$subject="";
$comments="";
$error_name = "";
$error_email = "";
$error_subject = "";
$error_comments = "";
$error_message = "";
$email_message = "";
 

if(isset ($_POST['send'])){   
    if(isset($_POST['email'])) {
            
            function died($error) { 
                // your error code can go here
                echo $error."<br /><br />"; 
                echo "Please go back and fix these errors.<br /><br />";
                die(); 
            }//end of died()
            
   //*****************************  input validation *************************************//         
    // validation expected data exists 
            $name = $_POST['name']; // required 
            $email = $_POST['email']; // required 
            $subject = $_POST['subject']; // not required 
            $comments = $_POST['comments']; // required    

        

    function clean_string($string) {
              $bad = array("content-type","bcc:","to:","cc:","href");
              return str_replace($bad,"",$string);
             }

    $email_message = "Thank you! \n ";
    
    //empty string or null check   
    //NAME:
    if(empty($name) || $name =='null'){
        $error_message .= "Please enter your name<br/>";   
        $error_name .= " * Please enter your name";  
    }
    else{
        $error_message .= ""; 
        $email_message .=  "NAME: ". strtoupper(clean_string($name)) . " \n";
    }//end of name validation
    
    
    //Email
    if(empty($email) || $email =='null'){
        $error_message .= "Please enter your Email<br/>";
        $error_email .= " * Please enter your Email";  
    }else{
        
        //email regular expression validation
        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/'; 
        if(!preg_match($email_exp,$email)){
            $error_email .= '* Please enter a valid email<br />'; 
            $error_message .= "Please enter a valid email<br />";
            }        
        else{
            $email_message .= "EMAIL: ". strtoupper(clean_string($email)). "\n"; 
            $error_message .= "";
        }            
    }//end of email validation
    
    //subject
    if(empty($subject) || $subject == 'null'){
        $error_message .= "Please write the subject<br/>";
        $error_subject .= " * Please write the subject";  
    }else{
        $email_message .= "SUBJECT: ". strtoupper(clean_string($subject)). " at " .strftime("%T", time()) ."\n";  
        $error_message .= "";
    }//end of subject validation
    
    
    //comments
   if(empty($comments) || $comments =='null'){
        $error_message .= "Please write comments";
        $error_comments = " * Please write comments";  
    }else{ 
        if(strlen($comments) < 2) {
           $error_comments .= 'The Comments you entered do not appear to be valid.<br />';
           $error_message .= "The Comments you entered do not appear to be valid.<br />";
        }
        else{
                $email_message .= "COMMENTS: ". clean_string($comments). "\n";
                $error_message .= "";
           }
    }//end of comments validation  
 //******************************* end of validation *****************************************//   
    
    if($error_message != "" ){
        header("location:contactus_form.php?err=".$error_message);
    }   
    else{
        require_once('PHPMailer/class.phpmailer.php');      
        require_once('PHPMailer/class.smtp.php');
      
        define('GUSER','gotorecipe@gmail.com' ); // GMail username
        define('GPWD','gotorecipehumber' ); // GMail password
        
        function smtpmailer($to, $from, $from_name, $subject, $body) {
                global $error;
                $mail = new PHPMailer();  // create a new object
                $mail->IsSMTP(); // enable SMTP
                $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true;  // authentication enabled
                $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 465;
                $mail->Username = GUSER;  
                $mail->Password = GPWD;          
                $mail->SetFrom($from, $from_name);
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->AddAddress($to);
                        if(!$mail->send()) {
                        $error = 'Mail error: '.$mail->ErrorInfo;
                        return false;
                        } else {
                        $error = 'Message sent!';
                        return true;
                        }
                }  // end of function smtpmailer
        
        
       $result= "";
        
        if ( smtpmailer('gotorecipe@gmail.com', $email, $name,  $subject, $email_message)) {
                   // echo "Thank you! <br/>";
            $result .= "Thank you!<br/>";
        }
        if (!empty($error)) {
            //echo $error;      
            $result .= $error;
         }    
    }//end of else            
}//end of $_POST['email']
}//end of $_POST['send']
 //http://www.web-development-blog.com/archives/send-e-mail-messages-via-smtp-with-phpmailer-and-gmail/
?>     
 <html>
<head>
</head>
<body>
    <?php
     echo $result;
     ?>
</body>
       
<?php       
        include PATH_FOOTER;
?>