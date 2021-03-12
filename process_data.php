<?php 
    require_once './vendor/recaptcha/src/autoload.php';
    
    var_dump( $_POST );

    if (isset( $_POST['g-recaptcha-response'] )) {
        $recaptcha = new \ReCaptcha\ReCaptcha('6LcVzXsaAAAAACQv3vSNQs4lhu5Fz00_wHmIQeQi');
        $response = $recaptcha->verify($_POST['g-recaptcha-response']);

        if ( $response->isSuccess() ) {
            echo 'OK';
        } else {
            $errors = $response->getErrorCodes();
            echo var_dump($errors);
        }
    }

?>