<?php
session_start();
//print_r($_SESSION);
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
} 
$logado = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ped Kids - Interface</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body, html {
            width: 100%;
            height: 100%;
            display: flex;
            background-color: #e0e0e0;
        }

        .container {
            display: flex;
            width: 100%;
            height: 100vh;
        }

        .sidebar {
            background-color: #757BFB;
            width: 20%;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
            color: white;
        }

        .logo {
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 50px;
        }

        .logo p {
            font-size: 14px;
            letter-spacing: 3px;
            margin-top: -4px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            width: 100%;
            align-items: center;
            gap: 20px;
        }

        .menu button {
            width: 80%;
            padding: 15px;
            font-size: 18px;
            color: white;
            background-color: #5A65E1;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .menu button:hover {
            background-color: #4A55D1;
        }

        .submenu {
            display: none;
            flex-direction: column;
            width: 80%;
            gap: 10px;
            margin-top: 10px;
        }

        .submenu button {
            padding: 10px;
            font-size: 16px;
            background-color: #4A55D1;
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
        }

        .submenu button:hover {
            background-color: #3A45B1;
        }

        .logout {
            display: inline-block;
            text-decoration: none;
            margin-top: auto;
            width: 80%;
            padding: 15px;
            font-size: 18px;
            color: white;
            background-color: #5A65E1;
            border: none;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .logout:hover {
            background-color: #4A55D1;
        }

        .content {
            width: 80%;
            background-color: #d3d3d3;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            display: none;
            flex-direction: column;
            width: 100%;
            max-width: 500px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #5A65E1;
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-group input, .form-group textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-container button {
            padding: 10px;
            font-size: 18px;
            color: white;
            background-color: #5A65E1;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container button:hover {
            background-color: #4A55D1;
        }

        .email-display {
            margin-bottom: 20px; /* Espaço entre o email e o botão "Sair" */
            color: white;
            font-size: 16px;
            text-align: center; /* Centraliza o texto do email */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">
                ped
                <p>KIDS</p>
            </div>
            <div class="email-display"><?php echo $logado; ?></div> <!-- Exibe o email aqui -->
            <div class="menu">
                <button onclick="toggleSubmenu('agendamentos-submenu')">Agendamentos</button>
                <div class="submenu" id="agendamentos-submenu">
                    <button onclick="showForm()">Marcar Consulta</button>
                    <button>Status da Solicitação</button>
                </div>

                <button onclick="toggleSubmenu('consultas-submenu')">Consultas</button>
                <div class="submenu" id="consultas-submenu">
                    <button>Consultas Confirmadas</button>
                    <button>Detalhes da Consulta</button>
                </div>

                <button onclick="toggleSubmenu('resultados-submenu')">Resultados</button>
                <div class="submenu" id="resultados-submenu">
                    <button>Cópia do Prontuário</button>
                    <button>Resultados de Exames</button>
                    <button>Receita Médica</button>
                </div>
            </div>
            <a href="sair.php" class="logout">Sair</a>
        </div>
        <div class="content">
            <!-- Formulário para Marcar Consulta -->
            <div class="form-container" id="marcar-consulta-form">
                <h2>Marcar Consulta</h2>
                <div class="form-group">
                    <label for="horario">Horário</label>
                    <input type="time" id="horario" name="horario">
                </div>
                <div class="form-group">
                    <label for="dia">Dia</label>
                    <input type="date" id="dia" name="dia">
                </div>
                <div class="form-group">
                    <label for="mensagem">Sintomas</label>
                    <textarea id="mensagem" name="mensagem" rows="4"></textarea>
                </div>
                <button type="submit">Enviar</button>
            </div>
        </div>
    </div>

    <script>
        function toggleSubmenu(id) {
            const submenu = document.getElementById(id);
            submenu.style.display = submenu.style.display === "flex" ? "none" : "flex";
        }

        function showForm() {
            const form = document.getElementById("marcar-consulta-form");
            form.style.display = "flex";
        }
    </script>
</body>
</html>
