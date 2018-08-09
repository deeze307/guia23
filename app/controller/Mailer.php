<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once dirname(dirname(dirname(__FILE__))).'/resources/vendor/autoload.php';


class Mailer
{

    public function send($mail_obj)
    {
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'deeze.designs@gmail.com';          // SMTP username
            $mail->Password = 'Bruno.2015';                      // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom($mail_obj->from_address, 'Guia23');
            $mail->addAddress($mail_obj->to_address, 'Usuario');     // Add a recipient

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $mail_obj->subject;
            if($mail_obj->mail_type == "moderador")
            {
                $mail->Body = $this->mailForSuccessAdvertsingCreation($mail_obj->ads_id,$mail_obj->ammount_to_pay,$mail_obj->titulo,$mail_obj->duration);
            }
            else
            {
                $mail->Body = $this->mailForAdminContact($mail_obj->name,$mail_obj->lastname,$mail_obj->from_address,$mail_obj->content);
            }

            $mail->send();
            return 'exito';
        } catch (Exception $e) {
            return 'El mensaje no pudo ser enviado. Mailer Error:  '.$mail->ErrorInfo;
        }
    }

    /**
     * Formato de correo Predeterminado para las publicaciones creadas correctamente
     *
     * @param $ad_id
     * @param $amount_to_pay
     * @return string
     */
    public function mailForSuccessAdvertsingCreation($ad_id,$amount_to_pay,$title,$duration)
    {
        if($duration < 2)
        {
            $duration .= " Mes";
        }
        else
        {
            $duration .= " Meses";
        }
        $fecha_limite_formato = strtotime("+2 Days");
        $fecha_limite = date("Y-m-d h:i", $fecha_limite_formato);
        $content = "<h3>Su Publicidad titulada <strong>'".$title."'</strong> ha sido creada exitosamente(#".$ad_id.").</h3>\n\n";
        $content.="<p>Su publicidad permanecerá activa por <strong>".$duration."</strong> una vez que esté activa.</p>";
        $content.="<p>Para que su publicidad sea visible para todo el publico usted deberá abonar la suma de <strong>$".$amount_to_pay."</strong> antes de la fecha: <strong>".$fecha_limite."</strong>.</p>";
        $content.="<p>Pasado el tiempo límite, su publicidad caducará y deberá generar una nuevamente.</p><hr>";
        $content.="<p>Su publicidad será revisada por un moderador y en cuanto se apruebe el contenido y se reciba el pago, usted recibirá un correo informativo y su publicidad estará disponible para todo el mundo</p><hr>";
        $content.="<p>Gracias por confiar en nosotros.\n</p>";
        $content.="<p><i>Atte. Soporte de Guia23.</i></p>";

        return $content;
    }

    public function mailForAdminContact($name,$lastname,$mail,$mail_content)
    {
        $content = "<h3>El usuario $name $lastname ($mail) tiene la siguiente consulta para hacerle:</h3>";
        $content .="<p>".$mail_content."</p>";
        return $content;
    }

}