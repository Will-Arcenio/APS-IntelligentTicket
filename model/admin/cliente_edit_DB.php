<?php
	session_start();

	include ('../../Conexao/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Editar Cliente DB</title>
</head>
<body>
	<?php
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$endereco = $_POST['endereco'];

		$sql = "UPDATE clientes SET nome = '{$nome}', cpf = '{$cpf}', endereco = '{$endereco}' WHERE id = '{$id}'";

		$query = mysqli_query($conexao, $sql);

		if ($query) {
			$_SESSION['cli_updated'] = [
				'updated' => 1,
				'user_id' => $id
			];
			header('Location: ../../view/page/admin/lista_cliente.php');
		} else {
			echo "Erro: " . mysqli_error($conexao);
		}
	?>
</body>
</html>

<?php
	mysqli_close($conexao);
?>