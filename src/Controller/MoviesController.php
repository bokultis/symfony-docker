<?php declare(strict_types=1);

namespace App\Controller;

use App\Service\MessageGenerator;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class MoviesController extends AbstractController
{
    #[Route(path: '/movies', name: "movies", methods: ["GET"])]
    public function index(): Response
    {
        return $this->json([
        'message' => 'Movies'
    ]);
    }

    /**
     * @Route("old", name="old")
     */
    public function oldMethod(LoggerInterface $logger, MessageGenerator $msgGenerator): Response
    {
        $logger->error('Look, I just used a service!');
        return $this->json([
            'message' => $msgGenerator->getHappyMessage()
        ]);
    }
}