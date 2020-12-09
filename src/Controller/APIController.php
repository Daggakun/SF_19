<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RecordRepository;

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
            $records = [];
            for ($i = 1; $i <= 422; $i++) {
                $records += ['town'.$i =>$recordRepository->findRecordsMapSort($i)];
            }
            return new JsonResponse($records);
        }
        return new JsonResponse('No data found', RESPONSE::HTTP_NOT_FOUND);
    }
}
