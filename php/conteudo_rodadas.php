<?php
include_once('conexao.php');

$opcao = isset($_GET['opcao']) ? $_GET['opcao'] : '1';

switch ($opcao) {
    case '1':
        $sql_rodada1 = "SELECT jogos.*, 
           casa.nome AS nome_time_casa, 
           casa.escudo_url AS escudo_time_casa, 
           fora.nome AS nome_time_fora, 
           fora.escudo_url AS escudo_time_fora
        FROM jogos
        INNER JOIN teams AS casa ON jogos.time_casa_id = casa.id
        INNER JOIN teams AS fora ON jogos.time_fora_id = fora.id
        WHERE jogos.round_id = 1";

        $resultado_rodada1 = $conexao->query($sql_rodada1);

        if ($resultado_rodada1->num_rows > 0) {
            while ($linha = $resultado_rodada1->fetch_assoc()) {
                echo "<div class='card-rodada'>";
                echo $linha['escudo_time_casa'];
                echo "<h3>" . $linha['nome_time_casa'] . "</h3>";
                echo "<h3>" . $linha['gols_time_casa'] . " - " . $linha['gols_time_fora'] . "</h3>";
                echo "<h3>" . $linha['nome_time_fora'] . "</h3>";
                echo $linha['escudo_time_fora'];
                echo "</div>";

                //talvez colocar data de inicio e fim da rodada ou até talvez a data especifica de cada jogo (precisaria colocar
                // a data dos jogos no banco de dados, o que talvez daria trabalho. Não sei se é relevante mas poderia ser interessante
                // para mais aprendizado)
            }
        }
        break;
    case '2':
        $sql_rodada2 = "SELECT jogos.*, 
           casa.nome AS nome_time_casa, 
           casa.escudo_url AS escudo_time_casa, 
           fora.nome AS nome_time_fora, 
           fora.escudo_url AS escudo_time_fora
        FROM jogos
        INNER JOIN teams AS casa ON jogos.time_casa_id = casa.id
        INNER JOIN teams AS fora ON jogos.time_fora_id = fora.id
        WHERE jogos.round_id = 2";

        $resultado_rodada2 = $conexao->query($sql_rodada2);

        if ($resultado_rodada2->num_rows > 0) {
            while ($linha = $resultado_rodada2->fetch_assoc()) {
                echo "<div class='card-rodada'>";
                echo $linha['escudo_time_casa'];
                echo "<h3>" . $linha['nome_time_casa'] . "</h3>";
                echo "<h3>" . $linha['gols_time_casa'] . " - " . $linha['gols_time_fora'] . "</h3>";
                echo "<h3>" . $linha['nome_time_fora'] . "</h3>";
                echo $linha['escudo_time_fora'];
                echo "</div>";
            }
        }
        break;
    case '3':
        $sql_rodada3 = "SELECT jogos.*, 
           casa.nome AS nome_time_casa, 
           casa.escudo_url AS escudo_time_casa, 
           fora.nome AS nome_time_fora, 
           fora.escudo_url AS escudo_time_fora
        FROM jogos
        INNER JOIN teams AS casa ON jogos.time_casa_id = casa.id
        INNER JOIN teams AS fora ON jogos.time_fora_id = fora.id
        WHERE jogos.round_id = 3";

        $resultado_rodada3 = $conexao->query($sql_rodada3);

        if ($resultado_rodada3->num_rows > 0) {
            while ($linha = $resultado_rodada3->fetch_assoc()) {
                echo "<div class='card-rodada'>";
                echo $linha['escudo_time_casa'];
                echo "<h3>" . $linha['nome_time_casa'] . "</h3>";
                echo "<h3>" . $linha['gols_time_casa'] . " - " . $linha['gols_time_fora'] . "</h3>";
                echo "<h3>" . $linha['nome_time_fora'] . "</h3>";
                echo $linha['escudo_time_fora'];
                echo "</div>";
            }
        }
        break;
    default:
        echo "<p>Selecione uma opção</p>";
}
?>