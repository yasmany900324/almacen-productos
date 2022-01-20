<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220120130626 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE almacen (id INT AUTO_INCREMENT NOT NULL, locacion VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, direccion VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, telefono VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compra (id INT AUTO_INCREMENT NOT NULL, factura_id INT DEFAULT NULL, almacen_destino_id INT DEFAULT NULL, fecha_recepcion DATETIME NOT NULL, INDEX IDX_9EC131FFF04F795F (factura_id), INDEX IDX_9EC131FF8C48E45E (almacen_destino_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compra_producto (id INT AUTO_INCREMENT NOT NULL, producto_id INT DEFAULT NULL, compra_id INT DEFAULT NULL, cantidad INT NOT NULL, importe_final BIGINT NOT NULL, INDEX IDX_C455FFD17645698E (producto_id), INDEX IDX_C455FFD1F2E704D7 (compra_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE factura (id INT AUTO_INCREMENT NOT NULL, numero_factura VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producto (id INT AUTO_INCREMENT NOT NULL, almacen_destino_id INT DEFAULT NULL, factura_id INT DEFAULT NULL, categoria_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, upc VARCHAR(255) DEFAULT NULL, cantidad BIGINT NOT NULL, precio_costo BIGINT NOT NULL, precio_venta BIGINT NOT NULL, peso_gramos DOUBLE PRECISION NOT NULL, peso_onzas DOUBLE PRECISION NOT NULL, peso_libras DOUBLE PRECISION NOT NULL, marca VARCHAR(255) NOT NULL, descripcion_es VARCHAR(512) NOT NULL, descripcion_en VARCHAR(512) NOT NULL, foto VARCHAR(255) NOT NULL, fecha_expiracion DATETIME NOT NULL, INDEX IDX_A7BB06158C48E45E (almacen_destino_id), INDEX IDX_A7BB0615F04F795F (factura_id), INDEX IDX_A7BB06153397707A (categoria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE venta (id INT AUTO_INCREMENT NOT NULL, fecha_venta DATETIME NOT NULL, cliente VARCHAR(255) NOT NULL, productos VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compra ADD CONSTRAINT FK_9EC131FFF04F795F FOREIGN KEY (factura_id) REFERENCES factura (id)');
        $this->addSql('ALTER TABLE compra ADD CONSTRAINT FK_9EC131FF8C48E45E FOREIGN KEY (almacen_destino_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE compra_producto ADD CONSTRAINT FK_C455FFD17645698E FOREIGN KEY (producto_id) REFERENCES producto (id)');
        $this->addSql('ALTER TABLE compra_producto ADD CONSTRAINT FK_C455FFD1F2E704D7 FOREIGN KEY (compra_id) REFERENCES compra (id)');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB06158C48E45E FOREIGN KEY (almacen_destino_id) REFERENCES almacen (id)');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB0615F04F795F FOREIGN KEY (factura_id) REFERENCES factura (id)');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB06153397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compra DROP FOREIGN KEY FK_9EC131FF8C48E45E');
        $this->addSql('ALTER TABLE producto DROP FOREIGN KEY FK_A7BB06158C48E45E');
        $this->addSql('ALTER TABLE producto DROP FOREIGN KEY FK_A7BB06153397707A');
        $this->addSql('ALTER TABLE compra_producto DROP FOREIGN KEY FK_C455FFD1F2E704D7');
        $this->addSql('ALTER TABLE compra DROP FOREIGN KEY FK_9EC131FFF04F795F');
        $this->addSql('ALTER TABLE producto DROP FOREIGN KEY FK_A7BB0615F04F795F');
        $this->addSql('ALTER TABLE compra_producto DROP FOREIGN KEY FK_C455FFD17645698E');
        $this->addSql('DROP TABLE almacen');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE compra');
        $this->addSql('DROP TABLE compra_producto');
        $this->addSql('DROP TABLE factura');
        $this->addSql('DROP TABLE producto');
        $this->addSql('DROP TABLE venta');
    }
}
