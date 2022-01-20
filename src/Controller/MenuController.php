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

        $items['almacen']['title'] = 'Almacenes';
        $items['almacen']['url'] = $this->generateUrl('almacen_index');
        if (in_array($route_name, ['almacen_index', 'almacen_new', 'almacen_show', 'almacen_edit'])) {
            $items['almacen']['class'] = "active";
        }

        $items['producto']['title'] = 'Productos';
        $items['producto']['url'] = $this->generateUrl('producto_index');
        if (in_array($route_name, ['producto_index', 'producto_new', 'producto_show', 'producto_edit'])) {
            $items['producto']['class'] = "active";
        }

        return $this->render('menu/index.html.twig', [
            'items' => $items,
        ]);
    }
}
