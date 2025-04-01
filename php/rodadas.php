<?php
    include_once('conexao.php');

    $sql_rodadas = 'SELECT * FROM rounds ORDER BY numero ASC';
    $resultado_rodadas = $conexao->query($sql_rodadas);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/rodadas.css">
    <title>Cartola FC - Rodadas</title>
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
        <h1>Rodadas</h1>
        <p>Acompanhe todas as rodadas do Brasileirão Série A 2025 com detalhes completos! Aqui você encontra os placares, scouts 
            individuais, estatísticas avançadas e a pontuação dos jogadores em cada partida. Explore cada rodada, analise o desempenho
             dos times e jogadores, e fique por dentro de tudo o que acontece no campeonato. Não perca nenhum detalhe e monte sua
              estratégia para mitar no Cartola FC!</p>
        <div id="select">
            <h3>Rodada</h3>
            <select id="seletor">
            <?php
                if ($resultado_rodadas->num_rows > 0) {
                    while ($linha = $resultado_rodadas->fetch_assoc()) {
                        echo "<option value='" . $linha['numero'] . "'>" . $linha['numero'] . "</option>";
                    }
                }
            ?>
            </select>
        </div>
        <div id="conteudo_rodadas">
            <?php include 'conteudo_rodadas.php'; ?>
        </div>
        <button onclick=adicionar_rodada()>Adicionar rodada</button>
        <button onclick=adicionar_partida()>Adicionar partidas</button>
        <script>
            document.getElementById("seletor").addEventListener("change", function() {
                let opcao = this.value;
                let xhr = new XMLHttpRequest();
                xhr.open("GET", "conteudo_rodadas.php?opcao=" + opcao, true);
                xhr.onload = function() {
                    document.getElementById("conteudo_rodadas").innerHTML = this.responseText;
                };
                xhr.send();
            });
            function adicionar_rodada() {
                document.getElementById("modal_adicionar_rodada").style.display = "flex";
            }
            function adicionar_partida() {
                document.getElementById("modal_adicionar_partida").style.display = "flex";
            }
            function fechar_modal_rodada() {
                document.getElementById("modal_adicionar_rodada").style.display = "none";
            }
            function fechar_modal_partida() {
                document.getElementById("modal_adicionar_partida").style.display = "none";
            }
        </script>

        <div id="modal_adicionar_rodada">
            <button class="fechar" onclick=fechar_modal_rodada()>Fechar</button>
            <h2>Adicionar rodada</h2>
            <p>Adicione uma nova rodada, onde posteriormente poderá</p>
            <label for="">Nº</label>
            <select name="" id="">
                <option value="">Teste</option>
            </select>
            <label for="">Data de início:</label>
            <input type="date">
            <label for="">Data de término:</label>
            <input type="date">
        </div>

        <div id="modal_adicionar_partida">
            <button class="fechar" onclick=fechar_modal_partida()>Fechar</button>
            <h2>Adicionar partida</h2>
            <p>Adicione uma nova rodada, onde posteriormente poderá</p>
            <label for="">Nº</label>
            <select name="" id="">
                <option value="">Teste</option>
            </select>
            <label for="">Data de início:</label>
            <input type="date">
            <label for="">Data de término:</label>
            <input type="date">
        </div>
    </main>
    <footer>
        <h3 id='nome_footer'>© Cartola DB<br></h3>
        <h3>O conteúdo do site não pode ser editado, copiado ou distribuído sem expressa autorização do desenvolvedor.<br><br></h3>
        <hr>
        <h4 id='por_footer'><br>Desenvolvido por:<br><br></h4>
        <a href="https://www.linkedin.com/in/jo%C3%A3o-pedro-da-cunha-machado-2089482b7/" target="_blank">João Pedro da Cunha Machado</a>
    </footer>
</body>
</html>