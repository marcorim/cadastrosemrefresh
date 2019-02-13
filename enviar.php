<?php
$connect = new PDO("mysql:host=localhost;dbname=tutorial", "root", "");

$data = [
	'nome' => $_POST["nome"],
	'fone' => $_POST["fone"],
	'cidade' => $_POST["cidade"],
];

$stmt = $connect->prepare('INSERT INTO tb_name (nome, telefone, cidade) values (:nome, :fone, :cidade)');

try{
	$connect->beginTransaction();
	$stmt->execute($data);
	$connect->commit();
	echo 'Registro salvo com sucesso';
}catch (Exception $e) {
	$connect->rollback();
	throw $e;
}