<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 10/01/17
 * Time: 16:41
 */

include_once ("userdao.php");

class User {



    private $id;
    private $password;
    private $nom;
    private $prenom;
    private $email;
    private $droit;
    private $active;
    private $token;
    private $nbconnection;
    private $userdao;

    private $mdpChanged;

    function __construct()
    {
        $this->userdao = new UserDAO();
        $this->mdpChanged = false;

    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    function getNom() { return $this->nom;   }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getDroit()
    {
        return $this->droit;
    }


    public function setDroit($droit)
    {
        $this->droit = $droit;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->mdpChanged = true;
        $this->password = $password;
    }


    public function getActive()
    {
        return $this->active;
    }


    public function setActive($active)
    {
        $this->active = $active;
    }


    public function getToken()
    {
        return $this->token;
    }


    public function setToken($token)
    {
        $this->token = $token;
    }


    public function getNbconnection()
    {
        return $this->nbconnection;
    }


    public function setNbconnection($nbconnection)
    {
        $this->nbconnection = $nbconnection;
    }



    public function delete() {

        $this->userdao->delete($this);

    }

    public function recuperer($mail, $password) {

        $data = $this->userdao->connectUser($mail, $password);
        $this->id = $data['id'];
        $this->nom = $data['nom'];
        $this->email = $data['email'];
        $this->prenom = $data['prenom'];
        $this->droit = $data['droit'];
        $this->active = $data['compteactive'];
        $this->token = $data['tokenrecupmdp'];
        $this->nbconnection = $data['nbconnection'];
        $this->password = $data['password'];

        return $data;

    }

    public function recupererById($id) {

        $data = $this->userdao->recupererById($id);
        $this->id = $data['id'];
        $this->nom = $data['nom'];
        $this->email = $data['email'];
        $this->prenom = $data['prenom'];
        $this->droit = $data['droit'];
        $this->active = $data['compteactive'];
        $this->token = $data['tokenrecupmdp'];
        $this->nbconnection = $data['nbconnection'];
        $this->password = $data['password'];

        return $data;

    }

    public function haveAccess($accesRequired) {

        foreach ($this->droit as $key => $value) {
            

            if($key == $accesRequired && $value) {
                return true;
            }

        }
        return false;

    }

    public function isAvailable() {



        if(!empty($this->id)) {

            return true;

        }

        return false;




    }



    public function addLog() {

        $this->userdao->addLog($this->email);


    }

    public function save() {



        if($this->mdpChanged) $this->userdao->changePassword($this);
        $this->userdao->updateGeneralInformation($this);
        $this->mdpChanged = false;


    }




}