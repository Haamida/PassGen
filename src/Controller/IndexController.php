<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
    *@Route("/")
     */
    public function number()
    {
        $number = random_int(0, 100);

        return $this->render('main.html.twig');
    }
}