<?php

namespace UserBundle\Messages;

use Symfony\Component\Validator\Constraints as Assert;

//use UserBundle\Listeners\AuthenticationListener;

class ContactManager
{
  const NOT_BLANK_MESSAGE = 'To pole nie moze byc puste';
  const EMAIL_MESSAGE = 'Musisz podac poprawny email';
  private $mailer;
  private $validator;

  public function __construct(Mailer $mailer)
  {
    $this->mailer = $mailer;
    $this->validator = $mailer->getValidator();
    $this->mailer->setTo('rom1119@poczta.onet.pl');
  }

  public function send()
  {
    $this->mailer->send();
  }

  public function setReplyTo($email)
  {
    $this->mailer->setReplyTo($email);

    return $this;
  }

  public function setBody($message)
  {
    $this->mailer->setBody($message);

    return $this;
  }

   public function setSubject($subject)
  {
    $this->mailer->setSubject($subject);

    return $this;
  }

  public function validate($data)
  {
    $notBlank = new Assert\NotBlank();
    $validEmail = new Assert\Email(array('checkMX' => true, 'checkHost' => true));
    $notBlank->message = self::NOT_BLANK_MESSAGE;
    $validEmail->message = self::EMAIL_MESSAGE;


    $violations['email'] = $this->validator->validate($data->get('_email'), array($validEmail, $notBlank));

    $violations['subject'] = $this->validator->validate($data->get('_subject'), array($notBlank));

    $violations['body'] = $this->validator->validate($data->get('_body'), array($notBlank));

    $response = null; 

    foreach ($violations as $key => $type) {
      foreach ($type as  $value) {
        $response[$key] = $value->getMessage();
      }
    }
      

    return $response;
  }

}