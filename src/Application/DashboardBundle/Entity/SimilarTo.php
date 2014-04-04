<?php
namespace Application\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sp_offender_similar_to")
 */
class SimilarTo {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id_offender_similar_to;
    
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

    public function getId_offender_similar_to() {
        return $this->id_offender_similar_to;
    }

    public function setId_offender_similar_to($id_offender_similar_to) {
        $this->id_offender_sign_type = $id_offender_similar_to;
    }


}