<?php

namespace UserBundle\Messages;

use Symfony\Component\Validator\Validation;


class Mailer
{
  private $mailer;
  private $message;
  private $validator;

  public function __construct(\Swift_Mailer $mailer)
  {
    $this->mailer = $mailer::newInstance(\Swift_MailTransport::newInstance());
    $this->message = \Swift_Message::newInstance();

    $this->validator = Validation::createValidator();

    $this->message->setFrom('rom1119@web-responsive.cba.pl');
  }

  public function send()
  {
    $this->mailer->send($this->message);
  }

  public function setSubject($subject)
  {
    $this->message->setSubject($subject);

    return $this;
  }

  public function setFrom($from)
  {
    $this->message->setFrom($from);

    return $this;
  }

  public function setTo($to)
  {
    $this->message->setTo($to);

    return $this;
  }

  public function setReplyTo($replyTo)
  {
    $this->message->setReplyTo($replyTo);

    return $this;
  }

  public function setBody($message)
  {
    $this->message->setBody($message, 'text/plain');

    return $this;
  }

  public function getValidator()
  {
    return $this->validator;
  }



}