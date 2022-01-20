<?php

namespace App\Entity;

use App\Repository\VentaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VentaRepository::class)
 */
class Venta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaVenta;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cliente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $productos;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaVenta(): ?\DateTimeInterface
    {
        return $this->fechaVenta;
    }

    public function setFechaVenta(\DateTimeInterface $fechaVenta): self
    {
        $this->fechaVenta = $fechaVenta;

        return $this;
    }

    public function getCliente(): ?string
    {
        return $this->cliente;
    }

    public function setCliente(string $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getProductos(): ?string
    {
        return $this->productos;
    }

    public function setProductos(string $productos): self
    {
        $this->productos = $productos;

        return $this;
    }

   
}
