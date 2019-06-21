<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Post
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
    * @var User
    *
    * @ORM\ManyToOne(targetEntity="User")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    private $user;

    /**
    * @var \DateTime
    *
    * @ORM\Column("date", type="datetime")
    */
    private $date;

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
    * Set title
    *
    * @param string $title
    *
    * @return Post
    */

    public function setTitle($title){
      $this->title = $title;

      return $this;
    }

    /**
    * Get $title
    *
    * @return string
    */
    public function getTitle(){
      return $this->title;
    }

    /**
    * Set body
    *
    * @param string $body
    *
    * @return Post
    */
    public function setBody( $body ){
      $this->body = $body;

      return $this;
    }

    /**
    * Get body
    *
    * @return string
    */
    public function getBody(){
      return $this->body;
    }

    /**
    * Set User
    *
    * @param User $user
    *
    * @return Post
    */
    public function setUser( User $user){
      $this->user = $user;

      return $this;
    }

    /**
    * Get User
    *
    * @return User
    */
    public function getUser(){
      return $this->user;
    }

    /**
    * Set date
    *
    * @param \DateTime $date
    *
    * @return Post
    */
    public function setDate($date){
      $this->date = $date;

      return $this;
    }

    /**
    * Get date
    *
    * @return \DateTime
    */
    public function getDate(){
      return $this->date;
    }
}
