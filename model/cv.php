<?php

/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 13/01/2017
 * Time: 20:56
 */

include_once "cvdao.php";

//classe CV qui permet de manipuler un objet CV (avec les getter et setter ainsi que des méthodes pour sauvgarder
//et aussi pour recuperer
class CV
{

    private $id;
    private $nom;
    private $prenom;
    private $sexe;
    private $pseudonyme;
    private $email;
    private $type;
    private $secuSocial;
    private $contratAssurancePro;
    private $urlCVs;
    private $urlContrat;
    private $tel;
    private $telFixe;
    private $adresse;
    private $codePostale;
    private $ville;
    private $remarques;
    private $urlImage;
    private $modifDate;
    private $comp;
    private $dao;



    function __construct($id)
    {
        if(!empty($id)) {
            $this->dao = new CVDAO();

            $this->id = $id;
            $this->init();

        }
    }

    private function init() {

        $cvDatas = $this->dao->getCV($this->id);
        $this->nom = $cvDatas['nom'];
        $this->prenom = $cvDatas['prenom'];
        $this->sexe = $cvDatas['sexe'];
        $this->pseudonyme = $cvDatas['pseudonyme'];
        $this->email = $cvDatas['email'];
        $this->type = $cvDatas['type'];
        $this->secuSocial = $cvDatas['securite_social'];
        $this->contratAssurancePro = $cvDatas['contrat_assurance_pro'];
        $this->urlContrat = $cvDatas['contra_assurance_pro_pdf'];
        $this->tel = $cvDatas['telephone_portable'];
        $this->telFixe = $cvDatas['telephone_fixe'];
        $this->adresse = $cvDatas['adresse'];
        $this->codePostale = $cvDatas['code_postale'];
        $this->ville = $cvDatas['ville'];
        $this->remarques = $cvDatas['remarque'];
        $this->urlImage = $cvDatas['photo_image'];
        $this->modifDate = $cvDatas['modif_date'];
        $this->comp = $cvDatas['comp'];

        if(!empty($cvDatas['cv_pdf'])) {
            $i = 0;
            foreach ($cvDatas['cv_pdf'] as $url) {

                $this->urlCVs[$i] = $url;
                ++$i;

            }
        }

    }

    public function update() {

    $this->dao->update($this);

    }

    public function delete() {

        $this->dao->delete($this->id);

    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * @return mixed
     */
    public function getPseudonyme()
    {
        return $this->pseudonyme;
    }

    /**
     * @param mixed $pseudonyme
     */
    public function setPseudonyme($pseudonyme)
    {
        $this->pseudonyme = $pseudonyme;
    }

    /**
     * @return mixed
     */
    public function getSecuSocial()
    {
        return $this->secuSocial;
    }

    /**
     * @param mixed $secuSocial
     */
    public function setSecuSocial($secuSocial)
    {
        $this->secuSocial = $secuSocial;
    }

    /**
     * @return mixed
     */
    public function getContratAssurancePro()
    {
        return $this->contratAssurancePro;
    }

    /**
     * @param mixed $contratAssurancePro
     */
    public function setContratAssurancePro($contratAssurancePro)
    {
        $this->contratAssurancePro = $contratAssurancePro;
    }

    /**
     * @return mixed
     */
    public function getCVsPDF()
    {
        return $this->urlCVs;
    }

    /**
     * @param mixed $urlCVs
     */
    public function setCVsPDF($urlCVs)
    {
        $this->urlCVs = $urlCVs;
    }

    /**
     * @return mixed
     */
    public function getUrlContrat()
    {
        return $this->urlContrat;
    }

    /**
     * @param mixed $urlContrat
     */
    public function setUrlContrat($urlContrat)
    {
        $this->urlContrat = $urlContrat;
        $this->dao->updateContrat($this->getId(),$urlContrat);
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getTelFixe()
    {
        return $this->telFixe;
    }

    /**
     * @param mixed $telFixe
     */
    public function setTelFixe($telFixe)
    {
        $this->telFixe = $telFixe;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getCodePostale()
    {
        return $this->codePostale;
    }

    /**
     * @param mixed $codePostale
     */
    public function setCodePostale($codePostale)
    {
        $this->codePostale = $codePostale;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getRemarques()
    {
        return $this->remarques;
    }

    /**
     * @param mixed $remarques
     */
    public function setRemarques($remarques)
    {
        $this->remarques = $remarques;
    }

    /**
     * @return mixed
     */
    public function getUrlImage()
    {
        return $this->urlImage;
    }

    /**
     * @param mixed $urlImage
     */
    public function setUrlImage($urlImage)
    {
        $this->urlImage = $urlImage;
        $this->dao->updatePhoto($this->getId(),$urlImage);
    }

    public function setModifDate($date) {
        $this->modifDate = $date;
    }

    public function getModifDate() {
        return $this->modifDate;
    }


    public function getComp() {

        return $this->comp;

    }

    public function haveComp($comp) {

        foreach($this->comp as $competences) {
            if($competences['nom_sous_comp'] == $comp)

                return true;


        }
        return false;


    }

    public function updateSousComp($sous_comp, $value) {

        $this->dao->updateSousComp($sous_comp, $value, $this->id);

    }


}