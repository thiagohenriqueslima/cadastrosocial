# Gesuas
Processo Seletivo - Desenvolvedor Web

### Descrição
O NIS (Número de Identificação Social) é um identificador único atribuído pela Caixa Econômica Federal aos cidadãos. Composto por 11 dígitos, é utilizado para realizar o pagamento de benefícios sociais, assim como chave de identificação nas Políticas Públicas, emissão de documentos, dentre outras utilidades. 

Esta aplicação consiste em realizar o cadastro do cidadão, que ao ser cadastrado, receberá um número NIS gerado automaticamente e atribuído a pessoa. Também é possível realizar pesquisas de pessoas cadastradas informando o número NIS.

### Requisitos
<ul>
    <li>PHP >= 7.4.16</li>
    <li>MySQL 5.7</li>
</ul>

### Execução Local
Além do PHP instalado localmente, é necessário também a instalação de um servidor web, como o <a href="https://www.apache.org/" target="_blank">Apache</a> por exemplo. Também é necessário informar os dados para conexão com o banco de dados através do arquivo .env, informando as seguintes variáveis:

<ul>
    <li>dbhost: o endereço do host;</li>
    <li>dbname: o nome do database;</li>
    <li>username: nome do usuário para acesso ao banco;</li>
    <li>password: e a senha para acesso.</li>
</ul>

Também é necessário executar o arquivo [install](install.sql) no banco de dados da aplicação para a criação da tabela.

Para executar a aplicação basta executar o arquivo [index](index.php) da aplicação. Ou seja, para executar o teste basta acessar este arquivo no navegador, como no exemplo abaixo:

<pre>
http://localhost/gesuas/index.php
</pre>

ou simplesmente

<pre>
http://localhost/gesuas
</pre>

No link acima, entende-se que foi criado uma pasta chamada gesuas dentro do ambiente de desenvolvimento.
