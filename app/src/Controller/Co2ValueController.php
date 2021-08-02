<?php

namespace App\Controller;

use App\airenv\Co2ValueInterface;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Co2ValueController extends AbstractController
{
    private Co2ValueInterface $co2Value;

    /**
     * Co2ValueController constructor.
     * @param Co2ValueInterface $co2Value
     */
    public function __construct(Co2ValueInterface $co2Value)
    {
        $this->co2Value = $co2Value;
    }

    /**
     * @Route("/latest/co2/{place}", name="co2_latest", methods="GET")
     */
    public function latest($place): Response
    {
        $result = $this->co2Value->latest($place);
        return $this->json($result, 200, $this->responseHeaders());
    }

    /**
     * @Route("/list/co2/{place}/{from}/{to}", name="co2_list", methods="GET")
     */
    public function list($place, $from, $to): Response
    {
        $fromDate = new DateTimeImmutable($from);
        $toDate = new DateTimeImmutable($to);
        $result = $this->co2Value->list($place, $fromDate, $toDate);
        return $this->json($result, 200, $this->responseHeaders());
    }

    private function responseHeaders(): array
    {
        return [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Credentials' => 'true',
            'Access-Control-Allow-Methods' => 'GET, OPTIONS',
            'Access-Control-Allow-Headers' => 'DNT, X-User-Token, Keep-Alive, User-Agent, X-Requested-With, If-Modified-Since, Cache-Control, Content-Type',
        ];
    }
}
