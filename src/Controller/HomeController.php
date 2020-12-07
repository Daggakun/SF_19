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

        /*Caching data from db so we can work in peace
        This means we have to get the data from there like this:
        $cache->fetch(weekId)*/

        $cache = new PhpFileCache(__DIR__.'/../Cache');
        // for ($i = 1; $i <= 52; $i++) {
        //     $store = $recordRepository->findBy([
        //         'weekNum' => $i
        //     ]);
        //     $cache->save("week{$i}", $store);
        // }
        $test = $recordRepository->findRecordsMapSort(3, 1);
        $cache->save('test', $test);
        $response = $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
        $record = $cache->fetch('test');
        var_dump($record);
        // $records = [];
        //
        // $records = $cache->fetch("week1");
        //
        // print_r($records);
        return $response;
    }


}
