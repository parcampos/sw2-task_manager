<?php require 'header.php'; ?>
<h2>Cadastro</h2>
<form action="../public/register.php" method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required>
    <br>
    <input type="submit" value="Cadastrar">
</form>
<p>Já tem uma conta? <a href="login.php">Faça login</a></p>
<?php require 'footer.php'; ?>
