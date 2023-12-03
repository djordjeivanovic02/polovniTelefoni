<?php
    require_once "../classes/User.php";
    require_once "../config/config.php";
    require_once "../classes/Phone.php";
    include_once '../exceptions/userExceptions.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $data = json_decode(file_get_contents('php://input'), true);
        if(isset($data['action'])){
            $user = new User();
            if($data['action'] === 'resend'){
                $email = $data['email'];
                try{
                    $result = $user->sendVerificationEmail($email);
                    $response = array(
                        'status' => 'success',
                        'message' => $result
                    );
                }catch(EMAIL_NOT_SENDED $e){
                    $response = array(
                        'status' => 'error',
                        'message' => 'Došlo je do greške prilikom slanja verifikacionog mail-a, molimo pokušajte kasnije!'
                    );
                }
            }
        }
    }
    echo json_encode($response);
?>