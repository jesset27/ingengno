<?php

namespace Jesse\Ingengno\Model\ClassesDAO;
use Jesse\Ingengno\Lib\DB;

class ProjetoDAO extends DAO
{
    protected string $table = "projetos";
    public function __construct(
        protected DB $DB
    ) {
    }

}
