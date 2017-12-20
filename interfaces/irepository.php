<?php
/**
	Interface básica para manipulação de dados no banco.
	@author: Marcelo Zilio Correa
	@since: 04/12/2017 - 13:12
*/
interface IRepository{
	public function save($object);
	public function find($cod);
	public function findAll();
	public function delete($cod);
	public function update($object);
}
?>