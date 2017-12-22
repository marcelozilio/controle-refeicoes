<?php
require_once 'repository/RefeicaoRepository.php';
require_once 'interfaces/IService.php';
require_once 'util/EmailUtil.php';
require_once 'util/Validacao.php';
require_once 'dto/RestResponse.php';

/**
 *
 * @author: Marcelo Zilio Correa
 * @since: 04/12/2017
 */
class RefeicaoService implements IService
{
    private $repository;
    private $pessoaService;
    private $emailUtil;

    public function __construct()
    {
        $this->repository = new RefeicaoRepository();
    }

    public function save($object)
    {
        try {
            $ret = $this->repository->save($object);
            $subject = 'Aviso de Refeição';
            $message = 'Aviso da refeição do dia: '.$object->dataRefeicao.'\nDescrição:'.$object->descricao;
            $this->sendEmails($object->idInstituicao, $subject, $message);
            return $ret;
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    public function find($id)
    {
        try {
            return $this->repository->find($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function findAll()
    {
        try {
            return $this->repository->findAll();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            return $this->repository->delete($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function update($object)
    {
    }

    public function sendEmails($idInstituicao, $subject, $message)
    {
        $pessoaService = new PessoaService();
        $pessoas = array();
        $pessoasFilter = array();

        $pessoas = $pessoaService->findAll();

        foreach ($pessoas as $p) {
            if ($p->idInstituicao == $idInstituicao) {
                array_push($pessoasFilter, $p);
            }
        }

        foreach ($pessoasFilter as $pes) {
            $emailUtil = new EmailUtil($pes->email, $subject, $message);
            //$emailUtil->sendEmail();
        }
    }
}
