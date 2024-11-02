<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    display: flex;
    height: 100vh;
    justify-content: center;
    align-items: center;
    background-color: #f0f0f0;
}

.container {
    display: flex;
    width: 80%;
    max-width: 1200px;
    height: 60vh;
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
}

.left-side {
    background-color: #6A63FF;
    width: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.logo h1 {
    color: white;
    font-size: 4em;
    font-weight: 900;
}

.logo h1 span {
    font-size: 0.5em;
    display: block;
    margin-top: -10px;
    letter-spacing: 5px;
}

.right-side {
    width: 50%;
    background-color: #f9f9f9;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-box {
    width: 80%;
    text-align: center;
}

.login-box h2 {
    color: #6A63FF;
    margin-bottom: 10px;
}

.login-box p {
    color: #888;
    margin-bottom: 20px;
}

form input {
    width: 100%;
    padding: 15px;
    margin: 10px 0;
    border: none;
    border-radius: 25px;
    background-color: #f0f0f0;
    font-size: 1em;
}

form button {
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 25px;
    background-color: #6A63FF;
    color: white;
    font-size: 1.2em;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #5a55e6;
}

.login-box p {
    margin-top: 15px;
    font-size: 0.9em;
}

.login-box a {
    color: #6A63FF;
    text-decoration: none;
}

.login-box a:hover {
    text-decoration: underline;
}
</style>

<?php
    if(isseT($_POST['submit'])){
        // print_r($_POST['nome']);
        // print_r('<br>');
        // print_r($_POST['email']);
        // print_r('<br>');
        // print_r($_POST['senha']);
        // print_r('<br>');

        include_once('config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, email, senha, cpf, telefone) 
        VALUES('$nome', '$email', '$senha', '$cpf', '$telefone')");
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - PEDKIDS</title>
    <link rel="stylesheet" href="/css">
</head>
<body>
    <div class="container">
        <div class="left-side">
            <div class="logo">
                <h1>ped <span>KIDS</span></h1>
            </div>
        </div>
        <div class="right-side">
            <div class="login-box">
                <h2>Seja bem-vindo!</h2>
                <p>Crie sua conta</p>
                <form action="cadastro.php" method="POST">
                    <input type="text" name="nome" placeholder="Nome Completo" required>
                    <input type="email" name="email" placeholder="E-mail" required>
                    <input type="password" name="senha" placeholder="Senha" required>
                    <input type="text" name="cpf" placeholder="CPF" required>
                    <input type="text" name="telefone" placeholder="Telefone" required>
                    <button type="submit" name="submit">Cadastrar-se</button>
                </form>
                <p>Já possui cadastro? <a href="login.php">Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>
