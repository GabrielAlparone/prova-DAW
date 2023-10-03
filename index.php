<!DOCTYPE html>
<html>
<head>
    <title>LOJAS ALPARONE!</title>
</head>
<body>

<?php
$produtos = array(
    array("nome" => "Boticario Cuide-se Bem (Cachos Exuberantes) - Shampoo Cachos 250 Ml", "codigo" => 21, "valor" => 22.99),
    array("nome" => "Boticario Cuide-se Bem (Cachos Exuberantes) - Condicionador 250 Ml", "codigo" => 22, "valor" => 23.99),
    array("nome" => "Boticario Cuide-se Bem (Cachos Exuberantes) - Condicionador 250 Ml", "codigo" => 23, "valor" => 24.99),
    array("nome" => "Boticario Cuide-se Bem (Liso Perfeito)  - Shampoo Alisador 250 Ml", "codigo" => 25, "valor" => 25.99),
    array("nome" => "Boticario Cuide-se Bem (Liso Perfeito) - Shampoo Alisador 250 Ml", "codigo" => 26, "valor" => 22.99),
    array("nome" => "Boticario Cuide-se Bem (Liso Perfeito) - Condicionador 250 Ml", "codigo" => 27, "valor" => 24.99),
    array("nome" => "Boticario Cuide-se Bem (Restauracao Extraordinaria)  - Condicionador 250 Ml", "codigo" => 28, "valor" => 24.99),
    array("nome" => "Boticario Cuide-se Bem (Restauracao Extraordinaria) - Condicionador 250 Ml", "codigo" => 29, "valor" => 24.99),
    array("nome" => "Boticario Cuide-se Bem (Hidratacao Imediata)  - Shampoo Hidratante 250 Ml", "codigo" => 30, "valor" => 24.99),
    array("nome" => "Boticario Cuide-se Bem (Hidratacao Imediata) - Shampoo Hidratante 250 Ml", "codigo" => 31, "valor" => 24.99),

    // Adicione outros produtos aqui
);

session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

$arquivo_carrinho = 'carrinho.txt';

function adicionarAoCarrinho($codigo, $quantidade) {
    global $produtos;

    foreach ($produtos as $produto) {
        if ($produto['codigo'] == $codigo) {
            $_SESSION['carrinho'][] = array('codigo' => $codigo, 'quantidade' => $quantidade, 'produto' => $produto);
        }
    }

    escreverNoArquivo();
}

function removerDoCarrinho($codigo) {
    foreach ($_SESSION['carrinho'] as $index => $item) {
        if ($item['codigo'] == $codigo) {
            unset($_SESSION['carrinho'][$index]);
            escreverNoArquivo();
            return;
        }
    }
}

function calcularValorTotal() {
    $total = 0;
    foreach ($_SESSION['carrinho'] as $item) {
        $produto = $item['produto'];
        $total += $produto['valor'] * $item['quantidade'];
    }
    return $total;
}

function escreverNoArquivo() {
    global $arquivo_carrinho;
    $file = fopen($arquivo_carrinho, 'w');

    foreach ($_SESSION['carrinho'] as $item) {
        $produto = $item['produto'];
        $mensagem = "{$produto['nome']}, {$item['quantidade']} un, " . number_format($produto['valor'] * $item['quantidade'], 2) . "\n";
        fwrite($file, $mensagem);
    }

    fclose($file);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["produto"]) && isset($_POST["quantidade"])) {
        $codigo = $_POST["produto"];
        $quantidade = $_POST["quantidade"];
        adicionarAoCarrinho($codigo, $quantidade);
    } elseif (isset($_POST["remover_produto"])) {
        $codigo = $_POST["remover_produto"];
        removerDoCarrinho($codigo);
    }
}
?>

<h1>Listagem de Produtos</h1>
<form method="post" action="">
    <label for="produto">Escolha um produto:</label>
    <select name="produto">
        <?php
        foreach ($produtos as $produto) {
            echo "<option value='{$produto['codigo']}'>{$produto['nome']} - R$ {$produto['valor']}</option>";
        }
        ?>
    </select>
    <label for='quantidade'>Quantidade: </label>
    <input type='number' name='quantidade' value='1' min='1'>
    <input type='submit' value='Adicionar ao Carrinho'>
</form>

<h1>Carrinho de Compras</h1>
<table border="1">
    <tr>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Valor Unitário</th>
        <th>Valor Total</th>
        <th>Ação</th>
    </tr>
    <?php
    foreach ($_SESSION['carrinho'] as $item) {
        $produto = $item['produto'];
        $valorTotal = $produto['valor'] * $item['quantidade'];

        echo "<tr>
                  <td>{$produto['nome']}</td>
                  <td>{$item['quantidade']}</td>
                  <td>R$ {$produto['valor']}</td>
                  <td>R$ {$valorTotal}</td>
                  <td><form method='post' action=''>
                        <input type='hidden' name='remover_produto' value='{$produto['codigo']}'>
                        <input type='submit' value='Remover'>
                      </form></td>
              </tr>";
    }
    ?>
    <tr>
        <td colspan="3">Total</td>
        <td>R$ <?php echo calcularValorTotal(); ?></td>
    </tr>
</table>



</body>
</html>
