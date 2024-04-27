<?php

namespace Jesse\Ingengno\Controllers;

use Jesse\Ingengno\Lib\DB;
use Jesse\Ingengno\Model\Classes\Projeto;
use Jesse\Ingengno\Model\ClassesDAO\ProjetoDAO;

class HomeController
{
    public function render()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $conn = new DB(
                'localhost',
                'ingengno',
                'root',
                ''
            );
            $projeto = new Projeto(null,
                $_POST['nome'],
                $_POST['email'],
                $_POST['assunto'],
                $_POST['descricao']
            );
            $projetoDAO = new ProjetoDAO($conn);
            $projetoDAO->create($projeto);
        }
    }
}
