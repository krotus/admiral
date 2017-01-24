<?php

namespace Bibloos\Admiral;


class User
{

    protected $firstName;
    protected $lastName;
    protected $email;

    public function setFirstName(string $name)
    {
        $this->firstName = trim($name);
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName(string $lastName)
    {
        $this->lastName = trim($lastName);
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function getFullName()
    {
        return $this->firstName . " " . $this->lastName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getEmailVariables()
    {
        return [
            'full_name' => $this->getFullName(),
            'email'     => $this->getEmail()
        ];
    }
}
