<?php
namespace Application\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sp_identification_category")
 */
class IdentificationCategory {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id_identification_category;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $name;
   
    public function getId_identification_category() {
        return $this->id_identification_category;
    }

    public function getName() {
        return $this->name;
    }

    public function setId_identification_category($id_identification_category) {
        $this->id_identification_category = $id_identification_category;
    }

    public function setName($name) {
        $this->name = mb_strtolower($name, 'UTF-8');
    }



}