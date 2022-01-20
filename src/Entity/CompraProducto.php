<?php

namespace App\Entity;

use App\Repository\CompraProductoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompraProductoRepository::class)
 */
class CompraProducto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Producto::class)
     */
    private $producto;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    /**
     * @ORM\Column(type="bigint")
     */
    private $importeFinal;

    /**
     * @ORM\ManyToOne(targetEntity=Compra::class, inversedBy="productosComprados")
     */
    private $compra;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getImporteFinal(): ?string
    {
        return $this->importeFinal;
    }

    public function setImporteFinal(string $importeFinal): self
    {
        $this->importeFinal = $importeFinal;

        return $this;
    }

    public function getProducto(): ?Producto
    {
        return $this->producto;
    }

    public function setProducto(?Producto $producto): self
    {
        $this->producto = $producto;

        return $this;
    }

    public function getCompra(): ?Compra
    {
        return $this->compra;
    }

    public function setCompra(?Compra $compra): self
    {
        $this->compra = $compra;

        return $this;
    }

    
}
