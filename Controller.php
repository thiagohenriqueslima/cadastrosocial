<?php
namespace App;
use App\DatabaseService;

include('DatabaseService.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Controller {
	private $service;

	public function __construct()
	{
		$this->service = new DatabaseService();
	}

	public function addCidadao($nome) : string
	{
		list($nome, $nis) = $this->service->inserirCidadao($nome);

		return "CADASTRO REALIZADO COM SUCESSO!<br />" .
		"Nome: $nome<br />" .
		"NIS: $nis<br />" .
		"<a href='index.php'>Clique aqui</a> para novo cadastro ou pesquisa";
	}

	public function buscaCidadao($nis) : string
	{
		$result = $this->service->buscarCidadao($nis);

		if ($result) {
			return "CIDADÃO LOCALIZADO!<br />" .
			"Nome: ".$result['nome']."<br />" .
			"NIS: ".$result['nis']."<br />" .
			"<a href='index.php'>Clique aqui</a> para novo cadastro ou pesquisa";
		}

		return "Cidadão não encontrado para o número NIS informado ($nis)<br />" .
		"<a href='index.php'>Clique aqui</a> para novo cadastro ou pesquisa";
	}
}

$controller = new Controller();

if (isset($_POST['nome'])) {
	echo $controller->addCidadao($_POST['nome']);
} else if ($_POST['nis']) {
	echo $controller->buscaCidadao($_POST['nis']);
}