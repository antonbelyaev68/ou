<?php
namespace Application\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sp_identification_reason")
 */
class IdentificationReason {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id_identification_reason;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $name;
   
    public function getId_identification_reason() {
        return $this->id_identification_reason;
    }

    public function getName() {
        return $this->name;
    }

    public function setId_identification_reason($id_identification_reason) {
        $this->id_identification_reason = $id_identification_reason;
    }

    public function setName($name) {
        $this->name = mb_strtolower($name, 'UTF-8');
    }


}