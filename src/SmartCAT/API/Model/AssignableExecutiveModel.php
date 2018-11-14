<?php

namespace SmartCat\Client\Model;

class AssignableExecutiveModel
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $surname;
    /**
     * @var string
     */
    protected $email;
    /**
     * @var string
     */
    protected $md5HashOfEMail;
    /**
     * @var string
     */
    protected $type;
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param string $id
     *
     * @return self
     */
    public function setId($id = null)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param string $name
     *
     * @return self
     */
    public function setName($name = null)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }
    /**
     * @param string $surname
     *
     * @return self
     */
    public function setSurname($surname = null)
    {
        $this->surname = $surname;
        return $this;
    }
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @param string $email
     *
     * @return self
     */
    public function setEmail($email = null)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * @return string
     */
    public function getMd5HashOfEMail()
    {
        return $this->md5HashOfEMail;
    }
    /**
     * @param string $md5HashOfEMail
     *
     * @return self
     */
    public function setMd5HashOfEMail($md5HashOfEMail = null)
    {
        $this->md5HashOfEMail = $md5HashOfEMail;
        return $this;
    }
    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @param string $type
     *
     * @return self
     */
    public function setType($type = null)
    {
        $this->type = $type;
        return $this;
    }
}