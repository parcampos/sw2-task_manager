<?php require 'header.php'; ?>
<h2>Login</h2>
<?php if (isset($error)): ?>
<p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>
<form action="../public/login.php" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required>
    <br>
    <input type="submit" value="Login">
</form>
<p>Não tem uma conta? <a href="register.php">Cadastre-se</a></p>
<?php require 'footer.php'; ?>
