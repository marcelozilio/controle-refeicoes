<?php
interface IService{
	public function save();
	public function find($cod);
	public function findAll();
	public function delete($cod);
	public function update($object);
}
?>