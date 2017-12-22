<?php

/**
 *
 * @author: Marcelo Zilio Correa
 * @since: 04/12/2017
 */
class EmailUtil
{
    private $email;
    private $subject;
    private $message;

    public function __construct($email, $subject, $message)
    {
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function sendEmail()
    {
        mail($this->email, $this->subject, $this->message);
    }
}
