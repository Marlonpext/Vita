<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VitalAge</title>
  <link rel="shortcut icon" href="vital/WhatsApp Image 2023-11-24 at 14.15.35.jpeg" type="x-icon">
  <link rel="stylesheet" href="estilo.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');

@media screen and (min-width: 1024px) {

    *{
        margin: 0;
        padding: 0;
    }


body{
    text-align: center;
    font-family: 'Nunito', sans-serif;
    margin: 0px;
    padding: 0px; 
    overflow-x: hidden; 

}


.links a{

    text-align: center;
    color: rgb(0, 0, 0);
    font-weight: bold;
    margin-left: 25px;
    font-size: 20px;
    font-family: 'Nunito', sans-serif;
    text-decoration: none;
    color: #3A5E9B;

}
.links img{
    width: 40px;
    margin-bottom: -8px;
    margin-left: -20px;
}
.links {
    width: 100%;
    background-color: #E8F4F8;
    margin-top: 0;
    font-weight: bold;
    color: #ffffff;
    z-index: 1000;
    position: relative; 
    top: 0; 
}

.links p{
    background-color: #3A5E9B;
    margin: 0px;
    font-size: 45px;
    font-family: 'Nunito', sans-serif;
    background-position: center;
    
    
}




.login {
    max-width: 400px;
    margin: 20px auto;
    padding: 100px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 50px rgba(0, 0, 0, 0.1);
 
    padding-bottom: 100px;
    
}

.login h2 {
    text-align: center;
    color: #3A5E9B;
    font-size: 25px;
    margin-bottom: 20px;
}

form {
    text-align: center;
    
}

label {
    display: block;
    margin-bottom: 8px;
    color: #3A5E9B;
    
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    
}

input[type="submit"] {
    background-color: #3A5E9B;
    color: #fff;
    cursor: pointer;
    width: 50%;
    transform: translateY(0px);
    animation: float 2s ease-in-out infinite;

}

@keyframes float {
    0% {
        transform: translateY(-10px); 
    }
    50% {
        transform: translateY(-12px); 
    }
    100% {
        transform: translateY(-10px); 
    }
}
    
}

input[type="submit"]:hover {
    background-color: #4f6c9e;
    
}
}
  </style>
</head>
<body>


<div class="links">   
      <p> <img src="vital/pe.png" alt="">    VitalAge</p> 
        <a href=paginaprincipal.php>Início</a>
        <a href="curso.php">Cursos</a>

    </div>
<div class="login">
    
<h2>Login Usuario</h2>
<form method="post" action="">
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" required><br>
    
    <label for="senha">Senha:</label><br>
    <input type="password" id="senha" name="senha" required><br>
    <br>
    
    <input type="submit" value="Entrar"> <br>
    <br>
    <a href="cadastroUsuario.php">Cadastre-se</a> <br>
    <a href="loginprofissional.php">Logue como Profissional</a>
    <?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "VITA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome"]) && isset($_POST["senha"])) {
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE nome = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Login bem-sucedido
        $_SESSION['logged_in'] = true;
        echo "<p>Login bem-sucedido!</p>";
        echo "<p><a href='lista.php'>Ir para a página principal</a></p>";
    } else {
        // Login falhou
        echo "<p>Nome de usuário ou senha incorretos.</p>";
    }

    $stmt->close();
}
?>
</form>
</div>
    
</body>
</html>

