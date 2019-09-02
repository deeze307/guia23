<?php

if(isset($_POST['submit'])){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    if(!empty($email)){
        
        try{
            // MailChimp API credentials
            $apiKey = '695e7026209d18aa1a2f34549214c9bd-us3';
            $listID = 'e5ed4f631b';
            
        
            
            // MailChimp API URL
            $memberID = md5(strtolower($email));
            $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
            $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/';
            
            // member information
            $json = json_encode([
                'email_address' => $email,
                'status'        => 'subscribed',
                'merge_fields'  => [
                    'Nombre Completo'=> $nombre,
                    ]
                    ]);
                    
            // send a HTTP POST request with curl
            $ch = curl_init($url);
            exit("aca");
            curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            $result = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            // store the status message based on response code
            if ($httpCode == 200) {
                $_SESSION['msg'] = '<p style="color: #34A853">Te has suscripto Exitosamente a Guia23.</p>';
            } else {
                switch ($httpCode) {
                    case 214:
                        $msg = 'Ya estás suscripto al Newsletter.';
                        break;
                    default:
                        $msg = 'Ocurrió un problema, por favor intente de nuevo.';
                        break;
                }
                $_SESSION['msg'] = '<p style="color: #EA4335">'.$msg.'</p>';
            }
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        
    }else{
        $_SESSION['msg'] = '<p style="color: #EA4335">Email inválido.</p>';
    }
    // redirect to homepage
    header("Location: ".__URL__."/home.php");
}

?>