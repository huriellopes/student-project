<?php

namespace App\Validates;

use Illuminate\Support\Facades\Validator;
use stdClass;
use Exception;

class Validate
{
    protected $rules = [];
    protected $messages = [];

    /**
     * Valida os parâmetros
     *
     * @param stdClass $params
     * @throws Exception
     * @return void
     */
    public function validaParametros(stdClass $params) : void
    {
        $validator = Validator::make((array) $params, $this->getRules(), $this->getMessages());

        if ($validator->fails()) {
            throw new Exception('Erro ao validar parâmetros!', 400);
        }
    }

    /**
     * @param int $id
     * @throws Exception
     */
    public function validaInteiro(int $id) : void
    {
        if (!is_int($id)) {
            throw new Exception('Erro!', 400);
        }
    }

    /**
     * @return array
     */
    public function getRules() : array
    {
        return $this->rules;
    }

    /**
     * @return array
     */
    public function getMessages() : array
    {
        return $this->messages;
    }
}
