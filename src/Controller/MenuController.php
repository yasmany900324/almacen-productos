<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
     /**
     * @var String $route_name
     *   Machine name of a route
     */
    public function mainMenu(String $route_name)
    {
        $items['home']['title'] = 'Inicio';
        $items['home']['url'] = $this->generateUrl('home');
        if ($route_name == 'home') {
            $items['home']['class'] = "active";
        }

        $items['categoria']['title'] = 'Categorías';
        $items['categoria']['url'] = $this->generateUrl('categoria_index');
        if (in_array($route_name, ['categoria_index', 'categoria_new', 'categoria_show', 'categoria_edit'])) {
            $items['categoria']['class'] = "active";
        }

        return $this->render('menu/index.html.twig', [
            'items' => $items,
        ]);
    }
}
