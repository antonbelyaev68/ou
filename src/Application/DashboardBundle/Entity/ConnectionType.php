<?php
namespace Application\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sp_offender_connection_type")
 */
class ConnectionType {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id_offender_connection_type;
    
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

    public function getId_offender_connection_type() {
        return $this->id_offender_connection_type;
    }

    public function setId_offender_connection_type($id_offender_connection_type) {
        $this->id_offender_connection_type = $id_offender_connection_type;
    }


}