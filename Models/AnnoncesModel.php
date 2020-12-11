<?php


namespace App\Models;

use App\Models\Model;

class AnnoncesModel extends Model
{
    protected $id;
    protected $titre;
    protected $description;
    protected $create_at;
    protected $actif;



    public function __construct()
    {
        $this->table  = 'annonces';
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre($titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription($description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getCreateAt()
    {
        return $this->create_at;
    }

    public function setCreateAt($createAt): self
    {
        $this->create_at = $createAt;
        return $this;
    }

    public function getActif(): int
    {
        return $this->actif;
    }
    public function setActif($actif): self
    {
        $this->actif = $actif;
        return $this;
    }
}
