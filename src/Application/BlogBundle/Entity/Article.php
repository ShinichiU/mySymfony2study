<?php

// Application/BlogBundle/Entity/Article.php
namespace Application\BlogBundle\Entity;

/**
 * @orm:Entity
 */
class Article
{
    const BLOG_OPEN = 1;
    const BLOG_CLOSE = 0;
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @orm:Column(type="string", length="255")
     */
    protected $name;

    /**
     * @orm:Column(type="string")
     */
    protected $body;

    /**
     * @orm:Column(type="integer")
     */
    protected $type;

    public function getId()
    {
      return $this->id;
    }

    public function setId($id)
    {
      $this->id = $id;

      return $this;
    }

    public function getName()
    {
      return $this->name;
    }

    public function setName($name)
    {
      $this->name = $name;

      return $this;
    }

    public function getBody()
    {
      return $this->body;
    }

    public function setBody($body)
    {
      $this->body = $body;

      return $this;
    }

    public function getType()
    {
      return $this->type;
    }

    public function setType($type)
    {
      $this->type = $type;

      return $this;
    }
}
