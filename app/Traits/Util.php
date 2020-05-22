<?php

namespace App\Traits;

trait Util
{
    /**
     * Função para limpar scripts
     *
     * @param $variavel
     * @return string|string[]|null
     */
    public function limpa_tags($variavel)
    {
        return preg_replace('(<(/?[^\>]+)>)', '', $variavel);
    }
}
