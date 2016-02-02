<?php
namespace tjrightdirection;

class Email extends \LSPHP\Email
{
    public function __construct()
    {
        $this->host = "sub4.mail.dreamhost.com";
        $this->username = "webform@tjrightdirection.co.uk";
        $this->password = "S6L7!Z4W";
        $this->port = "587";
        $this->from = "webform@tjrightdirection.co.uk";
    }

    public function sendContactFormMessage($name, $message)
    {
        $to = "axevalley@hotmail.co.uk";
        $reply = "webform@tjrightdirection.co.uk";
        $subject = "Web Form Message From " . $name;
        $body = $message;

        return $this->sendMail($to, $subject, $body, $reply = null);
    }
}
