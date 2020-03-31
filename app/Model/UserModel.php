<?php

namespace App\Model;


use App\Weblitzer\Model;
use App\App;

class UserModel extends Model
{
    protected static $table = 'geas_client';
    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $adresse1;
    private $password;
    private $ville;
    private $cp;
    private $telephone;
    private $created_at;
    private $modified_at;
    private $token;


    public static function generateToken($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function insertUser(string $nom, string $prenom, string $mail, string $adresse1, string $password, string $ville, int $cp, int $telephone): void
    {
        $token = UserModel::generateToken(255);
        $sql = "INSERT INTO " . self::getTable() . " VALUES(NULL,?,?,?,?,?,?,?,?,?,NOW(),NULL)";
        App::getDatabase()->prepareInsert($sql, [$nom, $prenom, $mail, $adresse1, $password, $token, $ville, $cp, $telephone]);
    }

    public static function userLogin(string $email)
    {
        $sql = "SELECT * FROM " . self::getTable() . " WHERE email= ?";
        return App::getDatabase()->prepare($sql, [$email], get_called_class(),true);
    }
   
    public static function findAllUsers()
    {
        return App::getDatabase()->query("SELECT * FROM " . self::getTable() . " ", get_called_class());
    }

    public static function usersEdit(int $id, $post)
    {
        $token = UserModel::generateToken(255);
        $sql = "UPDATE " . self::getTable() . " SET name=?, firstname=?, email=?, modified_at=NOW(), roles=?, token=? WHERE id=?";
        var_dump($sql);
        App::getDatabase()->prepareInsert($sql, [$post['name'], $post['firstname'], $post['email'],
            $post['roles'], $token, $_GET['id']]);
    }

    public static function changePassword($password, $token, $id)
    {
        $sql = "UPDATE " . self::getTable() . " SET pass=?, token=? WHERE id=?";
        App::getDatabase()->prepareInsert($sql, [$password, $token, $id]);
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getModifiedAt()
    {
        return $this->modified_at;
    }

    /**
     * @param mixed $modified_at
     */
    public function setModifiedAt($modified_at): void
    {
        $this->modified_at = $modified_at;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     */
    public function setRole($roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

    public function checkId($token)
    {
        $sql = "SELECT id FROM " .self::getTable() . " WHERE token=?";
        return App::getDatabase()->prepare($sql, [$token], get_called_class(), true);
    }


}
