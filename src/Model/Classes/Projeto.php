<?php

namespace Jesse\Ingengno\Model\Classes;

class Projeto {
    public $id;
    public $nome;
    public $email;
    public $assunto;
    public $descricao;

    public function __construct($id, $nome, $email, $assunto, $descricao) {
        $this->id = null;
        $this->nome = $nome;
        $this->email = $email;
        $this->assunto = $assunto;
        $this->descricao = $descricao;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
}

