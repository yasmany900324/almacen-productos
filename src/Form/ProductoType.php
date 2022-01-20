<?php

namespace App\Form;

use App\Entity\Almacen;
use App\Entity\Categoria;
use App\Entity\Producto;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('upc')
            ->add('cantidad')
            ->add('precioCosto')
            ->add('precioVenta')
            ->add('pesoGramos')
            ->add('pesoOnzas')
            ->add('pesoLibras')
            ->add('marca')
            ->add('descripcionEs')
            ->add('descripcionEn')
            ->add('foto')
            ->add('fechaExpiracion')
            ->add('almacenDestino',EntityType::class,['class' => Almacen::class,'choice_label' => 'nombre','attr'=>['class'=>'form-select', 'required'=>false]])
            ->add('factura')
            ->add('categoria',EntityType::class,['class' => Categoria::class,'choice_label' => 'nombre','attr'=>['class'=>'form-select', 'required'=>false]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Producto::class,
        ]);
    }
}
