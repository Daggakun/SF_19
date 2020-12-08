<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
        $records = [];
        for ($i = 1; $i <= 422; $i++) {
            $records += ['town'.$i => $recordRepository->findRecordsMapSort($i)];
        }
        dump($records);
        dump($records['town1']);
        // foreach ($records as $record) {
        //     $record['town'] = setTownById($records[$record]);
        // }
        $response = $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'records' => $records
        ]);
        return $response;
    }


}
