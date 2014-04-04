<?php
namespace Application\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sp_offender_sign_type")
 */
class SignType {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id_offender_sign_type;
    
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

    public function getId_offender_sign_type() {
        return $this->id_offender_sign_type;
    }

    public function setId_offender_sign_type($id_offender_sign_type) {
        $this->id_offender_sign_type = $id_offender_sign_type;
    }


}