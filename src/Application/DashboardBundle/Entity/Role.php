<?php

namespace Application\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sys_role")
 */
class Role implements RoleInterface {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id_role")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $name;
    
    
    public function __toString() {
        return $this->getName();
    }
    
    public function getRole() {
        return $this->getName();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    

}