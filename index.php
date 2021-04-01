<?php
namespace App;
use App\DatabaseService;

include('DatabaseService.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$html = "
	<div style='float: left; width:48%; border: 1px solid #ccc; padding: 10px;'>
		<h3>Cadastro de Identificação Social</h3>
		<hr />
		<form action='Controller.php' method='post'>
			<label for='nome'>Nome: </label>
			<input type='text' name='nome' placeholder='Informe seu nome' />
			<button type='submit' name='salvar'>Cadastrar</button>
	</form>
	</div>

	<div style='float: right; width:48%; border: 1px solid #ccc; padding: 10px;'>
		<h3>Pesquisar Cadastro</h3>
		<hr />
		<form action='Controller.php' method='post'>
			<label for='nis'>NIS: </label>
			<input type='text' name='nis' placeholder='Informe o número NIS' />
			<button type='submit' name='pesquisar'>Pesquisar</button>
		</form>
	</div>
";

echo $html;