<?php

declare(strict_types=1);

namespace FrankProjects\Chat\Controller;

use FrankProjects\UltimateWarfare\Controller\BaseController;
use FrankProjects\UltimateWarfare\Entity\User;
use Symfony\Component\HttpFoundation\Response;

final class ChatController extends BaseController
{
    public function chat(): Response
    {
        $user = $this->getUser();
        if ($user instanceof User) {
            $userId = $user->getId();
        } else {
            $userId = 0;
        }

        return $this->render('chat.html.twig', [
            'userId' => $userId,
            'websocketServerHost' => $this->getParameter('app.uw_chat_hostname'),
            'websocketServerPort' => $this->getParameter('app.uw_chat_public_port'),
        ]);
    }
}
