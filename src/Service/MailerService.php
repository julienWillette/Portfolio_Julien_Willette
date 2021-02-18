<?php
namespace App\Service;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use App\Entity\Contact;
class MailerService
{
    private $mailer;
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }
    public function sendEmailAfterContact(Contact $contact): void
    {
        $email = (new TemplatedEmail())
            ->from('julien.willette@gmail.com')
            //TODO: Change ->to('beeznessly')
            ->to('julien.willette@gmail.com')
            ->subject('Nouveau message')
            ->html(
                '<p>' . $contact->getFirstname() . ' ' .
                $contact->getLastname() . '</p> vous a envoyé un message:</p>' .
                '<p>Pour lui répondre ' .
                '<p>Email : ' . $contact->getMail() . ' ' . 
                '<p>Sujet : ' . $contact->getObject() . 
                '<p>Message ' . $contact->getMessage() . '</p>'
            );
        $this->mailer->send($email);
    }
}