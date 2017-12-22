<?php

/**
 *
 * @author: Marcelo Zilio Correa
 * @since: 04/12/2017
 */
class RestResponse
{
    private $response;

    public function __construct()
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
        return '<br />response: '.$this->response;
    }
}
