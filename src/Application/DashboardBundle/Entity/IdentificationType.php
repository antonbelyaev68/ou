<?php
namespace Application\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sp_identification_type")
 */
class IdentificationType {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id_identification_type;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $name;
   
    public function getId_identification_type() {
        return $this->id_identification_type;
    }

    public function getName() {
        return $this->name;
    }

    public function setId_identification_type($id_identification_type) {
        $this->id_identification_type = $id_identification_type;
    }

    public function setName($name) {
        $this->name = mb_strtolower($name, 'UTF-8');
    }



}