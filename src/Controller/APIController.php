<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use App\Repository\RecordRepository;
use App\Repository\TownRepository;
use App\Repository\DepartmentRepository;
use App\Repository\RegionRepository;


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
                $records = $recordRepository->findAll();
                $cacheResult->set($records);
                $cache->save($cacheResult);
                return new JsonResponse($records);
            }
        }
        return new JsonResponse('No data found', RESPONSE::HTTP_NOT_FOUND);
    }

    /**
     * @Route("/deptChart/{deptId}", name="deptChart")
     * Returns JSON response with necesary data to build dept chart
     */
    public function jsonDeptChart(Request $req, RecordRepository $recordRepository, Int $deptId) {
        if ($req->isXmlHttpRequest()) {
            $cache = new FilesystemAdapter();
            $cacheResult = $cache->getItem('dept' . $deptId);
            if ($cacheResult->isHit() && $cacheResult != NULL && !empty($cacheResult)) {
                return new JsonResponse($cacheResult->get());
            } else {
                $records = $recordRepository->findRecordsByDeptId($deptId);
                $cacheResult->set($records);
                $cache->save($cacheResult);
                return new JsonResponse($records);
            }
        }
        return new JsonResponse('No data found', RESPONSE::HTTP_NOT_FOUND);
    }

    /**
     * @Route("/townChart/{townId}", name="townChart")
     * Returns JSON response with necessary data to build town chart
     */
    public function jsonTownChart(Request $req, RecordRepository $recordRepository, Int $townId) {
        if ($req->isXmlHttpRequest()) {
            $cache = new FilesystemAdapter();
            $cacheResult = $cache->getItem('town' . $townId);
            if ($cacheResult->isHit() && $cacheResult != NULL && !empty($cacheResult)) {
                return new JsonResponse($cacheResult->get());
            } else {
                $records = $recordRepository->findRecordsByTownId($townId);
                $cacheResult->set($records);
                $cache->save($cacheResult);
                return new JsonResponse($records);
            }
        }
        return new JsonResponse('No data found', RESPONSE::HTTP_NOT_FOUND);

    }
}
