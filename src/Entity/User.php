<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 *  User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @var string
    *
    * @ORM\Column(name="username", type="string", length=191, unique=true)
    */
    private $username;

    /**
    * @var string
    *
    * @ORM\Column(name="password", type="text")
    */
    private $password;

    /**
    * Get id
    *
    * @return int
    */
    public function getId()
    {
        return $this->id;
    }

    /**
    * Set Username
    *
    * @param string $username
    *
    * @return User
    */
    public function setUsername($username){
      $this->username = $username;

      return $this;
    }

    /**
    * Get Username
    *
    * @return string
    */
    public function getUsername(){
      return $this->username;
    }

    /**
    * Set Password
    *
    * @param string $password
    *
    * @return User
    */
    public function setPassword($password){
      $this->password = $password;

      return $this;
    }

    /**
    * Get Password
    *
    * @return string
    */
    public function getPassword(){
      return $this->password;
    }
    
     public function getRoles()
    {
        return ["ROLE_USER"];
    }

    public function getSalt()
    {
        return "";
    }
    public function eraseCredentials()
    {
    }
}
