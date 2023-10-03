<!DOCTYPE html>
<html>
  <head>
    <title>LOJAS ALPARONE!</title>
  </head>
  <body>
    
    <?php 
        $nome = "";
        $codigo = "";
        $valor = "";

        $nome = $_POST['nome'];
        $codigo = $_POST['codigo'];
        $valor = $_POST['valor'];

  ?> 
         <form>
        <label for="nome"></label>
        <label for="codigo">:</label>
        <label for="valor">:</label><br>
     </form>
     <form method="post" action="inserircarrinho.php">
        <label for="Boticario Cuide-se Bem (Cachos Exuberantes) - Shampoo Cachos 250 Ml"></label>
        <label for="21">:</label>
        <label for="R$22,99">:</label>
        <input type="button" id="submit" name="inserir" required><br>
     </form>
         <form method="post" action="inserircarrinho.php">
        <label for="Boticario Cuide-se Bem (Cachos Exuberantes)  - Condicionador 250 Ml"></label>
        <label for="22">:</label>
        <label for="R$23,99">:</label>
        <input type="button" id="submit" name="inserir" required><br>
     </form>
         <form method="post" action="inserircarrinho.php">
        <label for="Boticario Cuide-se Bem (Cachos Exuberantes) - Condicionador 250 Ml"></label>
        <label for="23">:</label>
        <label for="R$24,99">:</label>
        <input type="button" id="submit" name="inserir" required><br>
     </form>
         <form method="post" action="inserircarrinho.php">
        <label for="Boticario Cuide-se Bem (Liso Perfeito)  - Shampoo Alisador 250 Ml"></label>
        <label for="25">:</label>
        <label for="R$25,99">:</label>
        <input type="button" id="submit" name="inserir" required>
     </form>
         <form method="post" action="inserircarrinho.php">
        <label for="Boticario Cuide-se Bem (Liso Perfeito) - Shampoo Alisador 250 Ml"></label><br>
        <label for="26">:</label>
        <label for="R$22,99">:</label>
        <input type="button" id="submit" name="inserir" required><br>
     </form>
         <form method="post" action="inserircarrinho.php">
        <label for="Boticario Cuide-se Bem (Liso Perfeito) - Condicionador 250 Ml"></label>
        <label for="27">:</label>
        <label for="R$24,99">:</label>
        <input type="button" id="submit" name="inserir" required><br>
     </form>
         <form method="post" action="inserircarrinho.php">
        <label for="Boticario Cuide-se Bem (Restauracao Extraordinaria)  - Condicionador 250 Ml"></label><br>
        <label for="28">:</label><br>
        <label for="R$24,99">:</label><br>
        <input type="button" id="submit" name="inserir" required><br>
     </form>
         <form method="post" action="inserircarrinho.php">
        <label for="Boticario Cuide-se Bem (Restauracao Extraordinaria) - Condicionador 250 Ml"></label>
        <label for="29">:</label>
        <label for="R$24,99">:</label>
        <input type="button" id="submit" name="inserir" required><br>
     </form>
         </form>
         <form method="post" action="inserircarrinho.php">
        <label for="Boticario Cuide-se Bem (Hidratacao Imediata)  - Shampoo Hidratante 250 Ml"></label>
        <label for="30">:</label>
        <label for="R$24,99">:</label>
        <input type="button" id="submit" name="inserir" required><br>
     </form>
         <form method="post" action="inserircarrinho.php">
        <label for="Boticario Cuide-se Bem (Hidratacao Imediata)  - Shampoo Hidratante 250 Ml"></label>
        <label for="31">:</label>
        <label for="R$24,99">:</label>
        <input type= "button" id="submit" name="inserir" required><br>
     </form>

 
  </body>
</html>
