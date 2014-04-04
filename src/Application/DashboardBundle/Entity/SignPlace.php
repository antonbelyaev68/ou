<?php
namespace Application\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sp_offender_sign_place")
 */
class SignPlace {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id_offender_sign_place;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = mb_strtolower($name, 'UTF-8');
    }

    public function getId_offender_sign_place() {
        return $this->id_offender_sign_place;
    }

    public function setId_offender_sign_place($id_offender_sign_place) {
        $this->id_offender_sign_place = $id_offender_sign_place;
    }


}