<?php
    include_once('conexao.php');

    $sql_times = 'SELECT * FROM teams ORDER BY nome ASC';
    $resultado_times = $conexao->query($sql_times);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/times.css">
    <title>Cartola FC - Times</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php"><img id="logo" src="../img/cartola_db_logo.png" alt=""></a></li>
                <li><a href="index.php">Início</a></li>
                <li><a href="times.php">Times</a></li>
                <li><a href="rodadas.php">Rodadas</a></li>
                <li><a href="jogadores.php">Jogadores</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Times</h1>
        <div id="times">
            <?php
                if ($resultado_times->num_rows > 0) {
                    while ($linha = $resultado_times->fetch_assoc()) {
                        echo "<div class='card-time'>";
                        echo $linha['escudo_url'];
                        echo "<h2>" . $linha['sigla']  . " - " . $linha['nome']. "</h2>";
                        echo "<h3>" . $linha['cidade'] . "</h3>";
                        echo "</div>";
                    }
                }
            ?>
        </div>
    </main>
    <footer>
        <h3 id='nome_footer'>© Cartola DB<br></h3>
        <h3>O conteúdo do site não pode ser editado, copiado ou distribuído sem expressa autorização do desenvolvedor.<br><br></h3>
        <hr>
        <h4 id='por_footer'><br>Desenvolvido por:<br><br></h4>
        <a href="www.linkedin.com/in/joão-pedro-da-cunha-machado-2089482b7" target="_blank">João Pedro da Cunha Machado</a>
    </footer>
</body>
</html>