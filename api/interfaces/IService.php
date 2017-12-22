<?php

/**
 * Interface básica para serviços.
 *
 * @author: Marcelo Zilio Correa
 * @since: 04/12/2017 - 13:30
 */
interface IService
{
    public function save($object);
    public function find($id);
    public function findAll();
    public function delete($id);
    public function update($object);
}
