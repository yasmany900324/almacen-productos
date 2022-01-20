<?php

namespace App\Entity;

use App\Repository\AlmacenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=AlmacenRepository::class)
 * @UniqueEntity("nombre",message="Ya existe un Almacén con el nombre {{ value }}")
 */
class Almacen
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Este campo es obligatorio")
     * @Assert\Length(
     *      min = 2,
     *      max = 10,
     *      minMessage = "Debe introducir al menos {{ limit }} caracteres",
     *      maxMessage = "No puede introducir más de {{ limit }} caracteres"
     * )
     */
    private $locacionlat;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Este campo es obligatorio") 
     * @Assert\Length(
     *      min = 2,
     *      max = 10,
     *      minMessage = "Debe introducir al menos {{ limit }} caracteres",
     *      maxMessage = "No puede introducir más de {{ limit }} caracteres"
     * )
     */
    private $locacionlong;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Este campo es obligatorio")
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Debe introducir al menos {{ limit }} caracteres",
     *      maxMessage = "No puede introducir más de {{ limit }} caracteres"
     * )
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      max = 512,
     *      minMessage = "Debe introducir al menos {{ limit }} caracteres",
     *      maxMessage = "No puede introducir más de {{ limit }} caracteres"
     * )
     */
    private $direccion;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Este campo es obligatorio") 
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Debe introducir al menos {{ limit }} caracteres",
     *      maxMessage = "No puede introducir más de {{ limit }} caracteres"
     * ) 
     */
    private $responsable;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Este campo es obligatorio")
     * @Assert\Length(
     *      min = 2,
     *      max = 12,
     *      minMessage = "Debe introducir al menos {{ limit }} caracteres",
     *      maxMessage = "No puede introducir más de {{ limit }} caracteres"
     * ) 
     */
    private $telefono;

   /**
     * @ORM\OneToMany(targetEntity=Compra::class, mappedBy="almacenDestino")
     */
    private $compras;

    public function __construct()
    {
        $this->compras = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * @return Collection|Compra[]
     */
    public function getCompras(): Collection
    {
        return $this->compras;
    }

    public function addCompra(Compra $compra): self
    {
        if (!$this->compras->contains($compra)) {
            $this->compras[] = $compra;
            $compra->setAlmacenDestino($this);
        }

        return $this;
    }

    public function removeCompra(Compra $compra): self
    {
        if ($this->compras->removeElement($compra)) {
            // set the owning side to null (unless already changed)
            if ($compra->getAlmacenDestino() === $this) {
                $compra->setAlmacenDestino(null);
            }
        }

        return $this;
    }

    public function getLocacionlat(): ?string
    {
        return $this->locacionlat;
    }

    public function setLocacionlat(string $locacionlat): self
    {
        $this->locacionlat = $locacionlat;

        return $this;
    }

    public function getLocacionlong(): ?string
    {
        return $this->locacionlong;
    }

    public function setLocacionlong(string $locacionlong): self
    {
        $this->locacionlong = $locacionlong;

        return $this;
    }
}
