<?php

namespace App\Entity;

use App\Repository\ProductoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductoRepository::class)
 */
class Producto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * Código de barra o código asignado por el sistema en caso que no tenga código de barra
     * Nota del documento: (- tener en cuenta que puede haber productos con codigo o no ), por eso es nullable este campo
     */
    private $upc;

    /**
     * @ORM\Column(type="bigint", length=255)
     */
    private $cantidad;

    /**
     * @ORM\Column(type="bigint")
     * Se nombra de esta forma para tener conformidad en la nomenclatura de los campos, ademas es mas claro a la hora de entender el negocio
     */
    private $precioCosto;

    /**
     * @ORM\Column(type="bigint")
     * 	precio de venta = Precio de costo + (domicilio) + (verificacion producto)
     *      domicilio = 10
     *	    verificacion producto:
	 *      si el producto esta en al categoria de carnes es el 80% del costo
     *      si el producto esta en la categoria de electrodomesticos es el 90% del costo
	 *      si el producto esta en la categoria de aseo es el 30% del costo
	 *      en cualquier otra categoria 20% del costo 
     */
    private $precioVenta;

    /**
     * @ORM\Column(type="float")
     */
    private $pesoGramos;

    /**
     * @ORM\Column(type="float")
     */
    private $pesoOnzas;

    /**
     * @ORM\Column(type="float")
     */
    private $pesoLibras;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marca;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $descripcionEs;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $descripcionEn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $foto;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaExpiracion;

    /**
     * @ORM\ManyToOne(targetEntity=Almacen::class, inversedBy="productos")
     */
    private $almacenDestino;

    /**
     * @ORM\ManyToOne(targetEntity=Factura::class, inversedBy="productos")
     */
    private $factura;

    /**
     * @ORM\ManyToOne(targetEntity=Categoria::class, inversedBy="productos")
     */
    private $categoria;

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

    public function getUpc(): ?string
    {
        return $this->upc;
    }

    public function setUpc(?string $upc): self
    {
        $this->upc = $upc;

        return $this;
    }

    public function getCantidad(): ?string
    {
        return $this->cantidad;
    }

    public function setCantidad(string $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getPrecioCosto(): ?string
    {
        return $this->precioCosto;
    }

    public function setPrecioCosto(string $precioCosto): self
    {
        $this->precioCosto = $precioCosto;

        return $this;
    }

    public function getPrecioVenta(): ?string
    {
        return $this->precioVenta;
    }

    public function setPrecioVenta(string $precioVenta): self
    {
        $this->precioVenta = $precioVenta;

        return $this;
    }

    public function getPesoGramos(): ?float
    {
        return $this->pesoGramos;
    }

    public function setPesoGramos(float $pesoGramos): self
    {
        $this->pesoGramos = $pesoGramos;

        return $this;
    }

    public function getPesoOnzas(): ?float
    {
        return $this->pesoOnzas;
    }

    public function setPesoOnzas(float $pesoOnzas): self
    {
        $this->pesoOnzas = $pesoOnzas;

        return $this;
    }

    public function getPesoLibras(): ?float
    {
        return $this->pesoLibras;
    }

    public function setPesoLibras(float $pesoLibras): self
    {
        $this->pesoLibras = $pesoLibras;

        return $this;
    }

    public function getMarca(): ?string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    public function getDescripcionEs(): ?string
    {
        return $this->descripcionEs;
    }

    public function setDescripcionEs(string $descripcionEs): self
    {
        $this->descripcionEs = $descripcionEs;

        return $this;
    }

    public function getDescripcionEn(): ?string
    {
        return $this->descripcionEn;
    }

    public function setDescripcionEn(string $descripcionEn): self
    {
        $this->descripcionEn = $descripcionEn;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(string $foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function getFechaExpiracion(): ?\DateTimeInterface
    {
        return $this->fechaExpiracion;
    }

    public function setFechaExpiracion(\DateTimeInterface $fechaExpiracion): self
    {
        $this->fechaExpiracion = $fechaExpiracion;

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

    public function getFactura(): ?Factura
    {
        return $this->factura;
    }

    public function setFactura(?Factura $factura): self
    {
        $this->factura = $factura;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    

    
}
