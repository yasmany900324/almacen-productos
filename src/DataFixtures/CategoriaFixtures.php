<?php

namespace App\DataFixtures;

use App\Entity\Categoria;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoriaFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categorias = array(
            [
                'nombre'=>'carnes',
                'descripcion'=>'carnes',
            ],
            [
                'nombre'=>'electrodomesticos',
                'descripcion'=>'electrodomesticos',
            ],
            [
                'nombre'=>'aseo',
                'descripcion'=>'aseo',
            ]
        );
        foreach($categorias as $categoria){
            $categoriaBD = new Categoria();
            $categoriaBD->setNombre($categoria['nombre']);
            $categoriaBD->setDescripcion($categoria['descripcion']);
            $manager->persist($categoriaBD);
        }

        $manager->flush();
    }
}
