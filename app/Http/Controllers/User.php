<?php

namespace App\Http\Controllers;


class User
{
    protected $firstName;

    protected $lastName;

    protected $email;


    /**
     * @return string
     */
    function __toString()
    {
        return "{$this->firstName} {$this->lastName} &lt{$this->email}&gt";
    }

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName(string $firstName)
    {

        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }



}