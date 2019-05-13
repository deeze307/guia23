<?php
require_once dirname(dirname(__FILE__))."/core/Core.php" ;

if (!isset($_SESSION))
{ session_start(); }

if(isset($_POST["submit"]))
{
    $contact = new Contact();
    $contact->sendContactEmail($_POST["name"],$_POST["lastname"],$_POST["email"],$_POST["content"]);

    header("Location: ".__URL__."/views/contact.php");
}


class Contact
{

    public function sendContactEmail($name,$lastname,$email,$content)
    {
        $mail_obj = new \stdClass();
        $mail_obj->name = $name;
        $mail_obj->lastname = $lastname;
        $mail_obj->to_address = "deeze.designs@gmail.com";
        $mail_obj->from_address = $email;
        $mail_obj->content = $content;
        $mail_obj->mail_type = "contacto";
        $mail_obj->subject = "Consulta de Usuario desde Guia23";
        $mailer = new Mailer();
        $result = $mailer->send($mail_obj);
        if($result == "exito")
        {
            $_SESSION["message"] = "Su mensaje ha sido enviado al equipo de soporte de Guia23.";
        }
        else
        {
            $_SESSION["error"] = $result;
        }
    }
}