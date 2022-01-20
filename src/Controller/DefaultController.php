<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        $number = random_int(0, 100);
        return $this->render('almacen/index.html.twig', [
            'number' => $number,
        ]);
    }
}