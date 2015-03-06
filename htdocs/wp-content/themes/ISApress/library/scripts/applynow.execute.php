<?php
require_once('../../../../../wp-load.php');

header("HTTP/1.0 200 OK");

function filterDefaultValue($string, $default) {
    if($string === $default) {
        return '';
    }else{
        return $string;
    }
}

function validateEmail ($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validate ($string) {
    if(!empty($string)) {
        return true;
    }else{
        return false;
    }
}

function niceName($string) {
    return str_replace('_', ' ', $string);
}

try {
    $conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $ex){
    die($ex->getMessage());
}

if (
    validate(filterDefaultValue($_POST['Name_&_Surname'],           'Name & Surname')) &&
    validate(filterDefaultValue($_POST['School'],                   'School')) &&
    validate(filterDefaultValue($_POST['Grade'],                    'Grade')) &&
    validate(filterDefaultValue($_POST['Cell_Number'],              'Cell Number')) &&
    validate(filterDefaultValue($_POST['Email'],                    'Email')) &&
    validate(filterDefaultValue($_POST['Parent_Contact_Number'],    'Parent Contact Number')) &&
    validate(filterDefaultValue($_POST['Programme'],                'Subject')) &&
    validate(filterDefaultValue($_POST['Message'],                  'Message'))
) {
    try {
        $log_form = $conn->prepare('INSERT INTO ' . APPLYNOW_FORM_LOGS_TBL . ' (name, school, grade, cellnumber, email, parentcontact, programme, message, date, unix) VALUES (:name, :school, :grade, :cellnumber, :email, :parentcontact, :programme, :message, :date, :unix)');

        $log_form->bindValue(':name',           $_POST['Name_&_Surname']);
        $log_form->bindValue(':school',         $_POST['School']);
        $log_form->bindValue(':grade',          $_POST['Grade']);
        $log_form->bindValue(':cellnumber',     $_POST['Cell_Number']);
        $log_form->bindValue(':email',          $_POST['Email']);
        $log_form->bindValue(':parentcontact',  $_POST['Parent_Contact_Number']);
        $log_form->bindValue(':programme',      $_POST['Programme']);
        $log_form->bindValue(':message',        $_POST['Message']);
        $log_form->bindValue(':date',           date('d-m-Y'));
        $log_form->bindValue(':unix',           time());
        
        if($log_form->execute()){
            $to = strip_tags(get_option('apply_form_emails'));

            $subject = 'IMM Website application form submission.';

            $headers = "From: " . strip_tags($_POST['Email']) . "\r\n";
            $headers .= "Reply-To: ". strip_tags($_POST['Email']) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            
            $body = 'A new IMM application has been submitted on ' . date('d-m-Y') . ':<br /><br />';
            
            foreach($_POST as $key => $val) {
                $body .= '<strong>' . niceName($key) . '</strong>: ' . $val . '<br />';
            }
            
            $mail = mail($to, $subject, $body, $headers);
            
            if($mail) {
                echo 'success';
            }else{
                echo 'There was an error sending the notification email.';
            }
            
        }
     
    } catch (PDOException $ex) {
        die($ex->getMessage());
    }
} else {
    die('Please fill in all the required form fields correctly before submitting.');
}

?>
