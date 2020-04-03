<?php

namespace App\Controller;

use App\Service\Foursquare;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FoursquareController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function categories()
    {
        return $this->json((new Foursquare())->get('venues/categories?'));
    }

    /**
     * @Route("/categories/{name}/locations", name="explore_api")
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function locations($name)
    {
        return $this->json((new Foursquare())->get('venues/explore?near=valletta&amp;query=' . $name . '&'));
    }
}
