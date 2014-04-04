<?php
namespace Application\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sp_offender_sex")
 */
class Sex {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id_offender_sex;
    
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

    public function getId_offender_sex() {
        return $this->id_offender_sex;
    }

    public function setId_offender_sex($id_offender_sex) {
        $this->id_offender_sex = $id_offender_sex;
    }



}