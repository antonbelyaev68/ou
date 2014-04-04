<?php

namespace Application\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sp_user_department")
 */
class Department {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id_user_department;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $name;
    
    public function __toString() {
        return (string)$this->name;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getIdUserDepartment() {
        return $this->id_user_department;
    }

    public function setIdUserDepartment($id_user_department) {
        $this->id_user_department = $id_user_department;
    }


}