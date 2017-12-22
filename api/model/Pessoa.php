<?php

/**
 *
 * @author: Marcelo Zilio Correa
 * @since: 04/12/2017
 */
class Pessoa
{
    private $id;
    private $idInstituicao;
    private $nome;
    private $endereco;
    private $email;
    private $celular;

    public function __construct()
    {
    }

    public function Pessoa()
    {
    }

    public function __get($atrib)
    {
        return $this->$atrib;
    }
    public function __set($atrib, $valor)
    {
        $this->$atrib = $valor;
    }
    public function __toString()
    {
        return '<br />Codigo: '.$this->id.
        '<br />idInstituicao: '.$this->idInstituicao.
        '<br />Nome: '.$this->nome.
        '<br />Endereco: '.$this->endereco.
        '<br />E-mail: '.$this->email.
        '<br />Celular: '.$this->celular;
    }
}
