<?php

/**
 * Interface básica para manipulação de dados no banco.
 *
 * @author: Marcelo Zilio Correa
 * @since: 04/12/2017 - 13:12
 */
interface IRepository
{
    public function save($object);
    public function find($id);
    public function findAll();
    public function delete($id);
    public function update($object);
}
