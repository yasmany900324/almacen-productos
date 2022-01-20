<?php

namespace App\Entity;

use App\Repository\CompraRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompraRepository::class)
 */
class Compra
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Factura::class)
     */
    private $factura;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaRecepcion;

    /**
     * @ORM\ManyToOne(targetEntity=Almacen::class, inversedBy="compras")
     */
    private $almacenDestino;

    /**
     * @ORM\OneToMany(targetEntity=CompraProducto::class, mappedBy="compra")
     */
    private $productosComprados;

    public function __construct()
    {
        $this->productosComprados = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaRecepcion(): ?\DateTimeInterface
    {
        return $this->fechaRecepcion;
    }

    public function setFechaRecepcion(\DateTimeInterface $fechaRecepcion): self
    {
        $this->fechaRecepcion = $fechaRecepcion;

        return $this;
    }

    public function getFactura(): ?Factura
    {
        return $this->factura;
    }

    public function setFactura(?Factura $factura): self
    {
        $this->factura = $factura;

        return $this;
    }

    public function getAlmacenDestino(): ?Almacen
    {
        return $this->almacenDestino;
    }

    public function setAlmacenDestino(?Almacen $almacenDestino): self
    {
        $this->almacenDestino = $almacenDestino;

        return $this;
    }

    /**
     * @return Collection|CompraProducto[]
     */
    public function getProductosComprados(): Collection
    {
        return $this->productosComprados;
    }

    public function addProductosComprado(CompraProducto $productosComprado): self
    {
        if (!$this->productosComprados->contains($productosComprado)) {
            $this->productosComprados[] = $productosComprado;
            $productosComprado->setCompra($this);
        }

        return $this;
    }

    public function removeProductosComprado(CompraProducto $productosComprado): self
    {
        if ($this->productosComprados->removeElement($productosComprado)) {
            // set the owning side to null (unless already changed)
            if ($productosComprado->getCompra() === $this) {
                $productosComprado->setCompra(null);
            }
        }

        return $this;
    }

    
}
