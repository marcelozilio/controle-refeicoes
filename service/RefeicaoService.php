<?php
require '../repository/RefeicaoRepository.php';
require_once '../interfaces/IService.php';
require_once '../util/EmailUtil.php';

class RefeicaoService implements IService{

	private $repository;
	private $pessoaService;
	private $emailUtil;

	public function __construct(){
		$this->repository = new RefeicaoRepository();
	}

	public function save($object){
		try{
			$ret = $this->repository->save($object);

			$subject = 'Aviso de Refeição';
			$message = 'Aviso da refeição do dia: '.$object->dataRefeicao.'\nDescrição:'.$object->descricao;

			$this->sendEmails($object->idInstituicao, $subject, $message);

			return $ret;
		}catch(Exception $ex){
			throw new Exception("Não foi possível salvar a Refeição");			
		}
	}

	public function find($id){		
		return $this->repository->find($id);
	}

	public function findAll(){		
		return $this->repository->findAll();		
	}

	public function delete($id){

	}

	public function update($object){

	}

	public function sendEmails($idInstituicao, $subject, $message){
		$pessoaService = new PessoaService();
		$pessoas = array();
		$pessoasFilter = array();		

		$pessoas = $pessoaService->findAll();

		foreach($pessoas as $p){
			if($p->idInstituicao == $idInstituicao){				
				array_push($pessoasFilter, $p);
			}
		}

		foreach ($pessoasFilter as $pes) {
			$emailUtil = new EmailUtil($pes->email, $subject, $message);
			$emailUtil->sendEmail();
		}
	}
}