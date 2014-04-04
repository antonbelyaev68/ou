<?php

namespace Application\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Application\DashboardBundle\Entity\Role;

/**
 * @ORM\Entity
 * @ORM\Table(name="sys_user")
 */
class User implements UserInterface {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id_user")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $login;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $password;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $otdel;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $salt;
    
    /**
    * @ORM\ManyToOne(targetEntity="Department", inversedBy="id_user_department")
    * @ORM\JoinColumn(name="id_user_department", referencedColumnName="id_user_department")
    */
    protected $id_user_department;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $access;
    
    /**
    * @ORM\ManyToMany(targetEntity="Application\DashboardBundle\Entity\Role")
    * @ORM\JoinTable(name="rel_user_role",
    *   joinColumns={@ORM\JoinColumn(name="id_user",referencedColumnName="id_user")},
    *   inverseJoinColumns={@ORM\JoinColumn(name="id_role",referencedColumnName="id_role")}
    * )
    */
    protected $userRoles;
    
    public function __construct() {
        $this->userRoles = new ArrayCollection();
    }
    
    
    public function getId() {
        return $this->id;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getOtdel() {
        return $this->otdel;
    }

    public function getAccess() {
        return $this->access;
    }

    public function getUserRoles() {
        return $this->userRoles;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setPassword($password) {
        #$this->password = $password;
        $this->password = md5($password);
    }

    public function setOtdel($otdel) {
        $this->otdel = $otdel;
    }

    public function setAccess($access) {
        $this->access = $access;
    }

    public function setUserRoles($role) {
        $this->userRoles = $role;
    }

    public function getIdUserDepartment() {
        return $this->id_user_department;
    }

    public function setIdUserDepartment($id_user_department) {
        $this->id_user_department = $id_user_department;
    }

    public function eraseCredentials() {
        /*сброс прав пользователя*/
    }

    public function getRoles() {
        #return $this->getUserRoles()->toArray();
        $tmp = $this->getUserRoles()->toArray();
        echo "<pre>"; var_dump($tmp); echo "</pre>"; exit;
        /*$roles = array();
        foreach ($this->userRoles as $role) {
            $roles[] = $role->getRole();
        }
        return $roles;*/
    }
    
    public function addRole(Role $userRole) {
        $this->userRoles[] = $userRole;
        return $this;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function getUsername() {
        return $this->getLogin();
    }
    
    public function setSalt($salt) {
        $this->salt = $salt;
    }

    public function equals(UserInterface $user){
        return md5($this->getUsername()) == md5($user->getUsername());
    }
}

#@ORM\OneToMany(targetEntity="Application\DashboardBundle\Entity\SpNewsStatus", mappedBy="id_news_status")    