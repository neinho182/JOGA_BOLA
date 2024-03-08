<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Nome</title>
    <link rel="stylesheet" href="confirm.css">
</head>
<body>
    <div class="container">
        <form action="adicionar_nome.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <button type="submit">Adicionar</button>
        </form>

        <h2>Nomes Adicionados:</h2>
        <ul>
            <?php
            // Dados de conexão ao banco de dados
            $host = 'roundhouse.proxy.rlwy.net';
            $port = '34485';
            $user = 'root';
            $password = 'dhFg1B6EaDb4Cgcc3Dde2Dc331HebhGC';
            $database = 'railway';

            // Conectar ao banco de dados
            $conn = new mysqli($host, $user, $password, $database, $port);

            // Verificar a conexão
            if ($conn->connect_error) {
                die("Erro de conexão: " . $conn->connect_error);
            }

            // Consulta para selecionar todos os nomes
            $sql = "SELECT nome FROM futebol";
            $result = $conn->query($sql);

            // Verificar se há resultados
            if ($result->num_rows > 0) {
                // Exibir os nomes em uma lista
                while($row = $result->fetch_assoc()) {
                    echo "<li>" . $row["nome"] . "</li>";
                }
            } else {
                echo "Nenhum nome encontrado.";
            }

            // Fechar conexão
            $conn->close();
            ?>
        </ul>
    </div>
</body>
</html>
