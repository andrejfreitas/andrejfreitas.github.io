<?php
 
if(isset($_POST['submit'])) {
 
      
    $email_to = "projeto.tranf.modelos@gmail.com" ;

    function died($error) {
  
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
    }

    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['subject']) ||
 
        !isset($_POST['message'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
    $name = $_POST['name']; 
 
    $email_from = $_POST['email']; 
 
    $subject = $_POST['subject'];   //captura o subject do formulario
 
    $message = $_POST['message']; 
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/'; //Expressão regular para testar se o email é valido
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }

 
    $email_message = "Form details below.\n\n";
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
    $email_message .= "Name: ".clean_string($name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Menssage: ".clean_string($message)."\n";
 
     
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion() ;
 
@mail($email_to, $subject, $email_message, $headers);  

?>
 
 
Thank you for contacting us. We will be in touch with you very soon.

 
 
 
<?php
}
 
?>