<?php
/**
	Interface básica para serviços.
	@author: Marcelo Zilio Correa
	@since: 04/12/2017 - 13:30
*/
interface IService{
	public function save($object);
	public function find($cod);
	public function findAll();
	public function delete($cod);
	public function update($object);
}
?>