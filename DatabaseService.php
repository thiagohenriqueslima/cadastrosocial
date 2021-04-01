<?php
namespace App;

use App\Database;
use Exception;

include('Database.php');
//include('.env');

class DatabaseService {
	private $connection;

	public function __construct()
	{
		$parsed = parse_ini_file('.env', true);

		$this->connection = new Database(
		    $parsed['database']['dbhost'],
		    $parsed['database']['dbname'],
		    $parsed['database']['username'],
		    $parsed['database']['password']
		);
	}

	/**
	 * Insere o cidadão
	 * @param $nome Nome do cidadão
	 * @return array
	 */
	public function inserirCidadao(string $nome) : array
	{
		try {
			if ($nis = $this->verificarCadastro($nome)) {
				throw new Exception("Cliente já cadastrado! Nome: ($nome) - NIS: ($nis)");				
			}

			$novoNis = $this->gerarIdentificacaoSocial($nome);

			$id = $this->connection->insert("insert into `cidadao`( `nome` , `nis`) values (?, ?)", [
				'ss',
				$nome,
				$novoNis
			]);

			if (!$id) {
				throw new Exception("Ocorreu um erro ao efetuar o cadastro!");				
			}

			return [$nome, $novoNis];
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Realiza a busca do cidadão pelo número do NIS
	 * @param string $nis NIS
	 * @return ?array
	 */
	public function buscarCidadao(string $nis) : ?array
	{
		$result = $this->connection
			->select("select nome, nis from cidadao where upper(nis) = '".strtoupper($nis)."'");

		if (count($result)) {
			return $result[0];
		}

		return null;
	}

	/**
	 * Verifica se o nome informado já possui cadastro.
	 * @param $nome Nome do cidadão
	 * @return ?string
	 */
	private function verificarCadastro(string $nome) : ?string
	{
		$result = $this->connection
			->select("select nis from cidadao where upper(nome) = '".strtoupper($nome)."'");
		
		if (count($result)) {
			return $result[0]['nis'];
		}

		return false;
	}

	/**
	 * Gera um número de identificação baseado no nome informado.
	 * @param $nome Nome do cidadão
	 * @return string
	 */
	private function gerarIdentificacaoSocial($nome) : string
	{
		return strtoupper(substr(md5($nome), 0, 11));
	}
}