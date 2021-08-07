<?php

namespace App\Controller;

use App\airenv\Co2LogInterface;
use App\airenv\exception\Co2Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Co2LogController extends AbstractController
{
    private Co2LogInterface $co2Log;

    /**
     * AirenvController constructor.
     * @param Co2LogInterface $co2Log
     */
    public function __construct(Co2LogInterface $co2Log)
    {
        $this->co2Log = $co2Log;
    }

    /**
     * @Route("/add/co2/{place}/{value}", name="airenv", methods="POST")
     */
    public function addCo2($place, $value): Response
    {
        try {
            $this->co2Log->log([
                'place' => $place,
                'value' =>  $value
            ]);

        } catch (Co2Exception $e) {
            return $this->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }

        return $this->json([
            'success' => true,
            'message' => 'saved',
            'place' => $place,
            'value' => $value,
        ]);
    }
}
