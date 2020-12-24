<?php

namespace App\Models;

use App\Models\Model;

class UsersModel extends Model
{
    protected $id;
    protected $email;
    protected $password;
    protected $roles;

    public function __construct()
    {
        $this->table = 'users';
    }


    /**
     * find one user by email
     *
     * @param string $email
     * @return self
     */
    public function findOneByEmail(string $email)
    {

        return $this->requete('SELECT * FROM ' . $this->table . ' WHERE email = ?', [$email])->fetch();
    }


    public function setSession()
    {
        $_SESSION['user'] = [
            'id' => $this->id,
            'email' => $this->email,
            'roles' => $this->roles
        ];
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of roles
     */
    public function getRoles(): array
    {
        $roles =  $this->roles;
        $roles[] = 'ROLES_USER';
        return array_unique($roles);
    }

    /**
     * Set the value of roles
     *
     * @return  self
     */
    public function setRoles($roles)
    {
        $this->roles = json_decode($roles);

        return $this;
    }
}
