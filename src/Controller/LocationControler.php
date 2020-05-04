<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocationControler extends AbstractController {

    /**
     * @Route("/locations", name="location.index")
     * @return Response
     */
    public function index (): Response
    {
        return $this->render('location/index.html.twig', [
            'current_only' => 'locations'
        ]);
    }

}