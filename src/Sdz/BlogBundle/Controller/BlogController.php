<?php

// src/Sdz/BlogBundle/Controller/BlogController.php

namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
  public function indexAction()
  {
    // Récupération du service
    $mailer = $this->get('mailer');

    // Création de l'e-mail : le service mailer utilise SwiftMailer, donc nous créons une instance de Swift_Message
    $message = \Swift_Message::newInstance()
      ->setSubject('Hello zéro !')
      ->setFrom('tutorial@symfony2.com')
      ->setTo('votre@email.com')
      ->setBody('Coucou, voici un email que vous venez de recevoir !');

    // Retour au service mailer, nous utilisons sa méthode « send() » pour envoyer notre $message
    $mailer->send($message);

    // N'oublions pas de retourner une réponse, par exemple une page qui afficherait « L'e-mail a bien été envoyé »
    return new Response('Email bien envoyé');
  }

}