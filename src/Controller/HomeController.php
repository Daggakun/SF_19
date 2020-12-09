<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RecordRepository;
use Doctrine\Common\Cache\PhpFileCache;
use App\Entity\Record;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function index(RecordRepository $recordRepository): Response
    {

        $response = $this->render('home/index.html.twig', [
        ]);
        return $response;

    }

    
}
