<?php

// Carrega configurações globais
require("_global.php");

// Configurações desta página
$page = array(
    "title" => "Artigo Completo", // Título desta página
    "css" => "view.css",            // Folha de estilos desta página
    "js" => "index.js",              // JavaScript desta página
);

//Obter id do artigo e armazenar na variavel 'id'
// Operador Ternário
$id = isset($_GET['id']) ? intval($_GET['id']) :0;

// Se, o id for falso, retorna 404
// Referências: https://www.w3schools.com/php/func_network_header.asp
if($id < 1 ) header('Location: 404.php');

// Obtem o artigo do banco de dados

$sql = <<<SQL

SELECT * 
FROM `article`
WHERE art_id = '{$id}'
	AND art_date <= NOW()
    AND art_status = 'on';

SQL;

// Executa o SQL

$res = $conn->query($sql);

// Se artigo não existe redireciona para 404

if($res->num_rows == 0) header('Location: 404.php');

// Inclui o cabeçalho do documento
require('_header.php');
?>

<article></article>

<aside></aside>

<?php require('_footer.php') ?>