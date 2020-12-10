<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RecordRepository;
use App\Repository\TownRepository;
use App\Repository\DepartmentRepository;
use App\Repository\RegionRepository;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;


/**
 * @Route("/api")
 */
class APIController extends AbstractController
{
    /**
     * @Route("/jsonmap", name="jsonmap")
     * Returns JSON response with necessary data to build the map
     */
    public function jsonMap(Request $req, RecordRepository $recordRepository) {
        if ($req->isXmlHttpRequest()) {
            $cache = new FilesystemAdapter();
            $cacheResult = $cache->getItem('jsonMap');
            if ($cacheResult->isHit() && $cacheResult != NULL && !empty($cacheResult)) {
                return new JsonResponse($cacheResult->get());
            } else {
                $records = [];
                for ($i = 1; $i <= 422; $i++) {
                    $records['town'.$i] = $recordRepository->findRecordsMapSort($i);
                }
                $cacheResult->set($records);
                $cache->save($cacheResult);
                return new JsonResponse($records);
            }
        }
        return new JsonResponse('No data found', RESPONSE::HTTP_NOT_FOUND);
    }
}
