<?php
namespace Application\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sp_offender_height")
 */
class Height {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id_offender_height;
    
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

    public function getId_offender_height() {
        return $this->id_offender_height;
    }

    public function setId_offender_height($id_offender_height) {
        $this->id_offender_height = $id_offender_height;
    }


}