<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo3.css">
    <link rel="shortcut icon" href="vital/WhatsApp Image 2023-11-24 at 14.15.35.jpeg" type="x-icon">
    <title>Cadastro de Profissional</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');

body {
    font-family: 'Nunito', sans-serif;
    text-align: center;
    margin: 0;
    padding: 0;
}

.links a {
    text-align: center;
    color: rgb(0, 0, 0);
    font-weight: bold;
    margin-left: 25px;
    font-size: 20px;
    font-family: 'Nunito', sans-serif;
    text-decoration: none;
    color: #3A5E9B;
}

.links img {
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

.links p {
    background-color: #3A5E9B;
    margin: 0px;
    font-size: 45px;
    font-family: 'Nunito', sans-serif;
    padding: 0px; /* Added padding */
}

.cadastrar {
    max-width: 400px;
    margin: 20px auto;
    padding: 40px; /* Adjusted padding */
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 50px rgba(0, 0, 0, 0.1);
}

.cadastrar h2 {
    text-align: center;
    color: #3A5E9B;
    font-size: 25px;
    margin-top: -20px;
}

form {
    width: 80%;
    max-width: 500px;
    margin: 20px auto;
    padding: 20px;
}

label {
    display: block;
    margin-top: 10px;
    color: #3A5E9B;
}

input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 10px; /* Adjusted margin-bottom */
    box-sizing: border-box;
}

input[type="radio"] {
    margin-top: 10px;
    margin-bottom: 15px; /* Adjusted margin-bottom */
}

input[type="submit"] {
    background-color: #3A5E9B;
    color: #E8F4F8;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    box-shadow: 0 0 10px 0 rgba(58, 94, 155, 0.5);
    border-radius: 5px;
    margin-bottom: -10px; /* Adjusted margin-bottom */
}

input[type="submit"]:hover {
    background-color: #265181;
}

.linha {
    display: flex;
    align-items: center;
}

.linha label {
    margin-right: 10px;
}

.linha input[type="radio"] {
    margin-right: 5px;
}

.tete {
    margin-bottom: 10px;
}
    </style>
</head>
<body>

    <div class="links">   
        <p> <img src="vital/pe.png" alt="">    VitalAge</p> 
          <a href=paginaprincipal.php>Início</a>
          <a href="Loginprofissional.php">Login</a>
          <a href="curso.php">Cursos</a>
    </div>

    <div class="cadastrar">
        <h2>Cadastro de Profissional</h2>

        <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "VITA";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

   
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }


    session_start();

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"]; 
        $cpf = $_POST["cpf"];
        $especialidade = $_POST["especialidade"];
        $idade = $_POST["idade"];
        $sexo = $_POST["sexo"];
        $curso = $_POST["curso"];
        $cep = $_POST["cep"];
        $telefone = $_POST["telefone"];
    
        $sql = "INSERT INTO profissional (nome, email, senha, CPF, especialidade, idade, sexo, curso, cep, telefone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {
            $stmt->bind_param("sssssissss", $nome, $email, $senha, $cpf, $especialidade, $idade, $sexo, $curso, $cep, $telefone);
    
            if ($stmt->execute()) {
                echo "<p>Registro inserido com sucesso!</p>";
                echo "<p><a href='paginaprincipal.php'>Voltar para a página principal</a></p>";
            } else {
                echo "Erro ao inserir registro: " . $stmt->error;
            }
    
            $stmt->close();
        } else {
            echo "Erro na preparação da consulta: " . $conn->error;
        }
    }
    
    ?>        
        <form method="post" action="cadastroprofissionais.php">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required>
        
        <label for="especialidade">Especialidade:</label>
        <input type="text" id="especialidade" name="especialidade" required>
        
        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required>

        
        <div class="tete">
        <label for="sexo">Sexo:</label>
        </div>

        <div class="linha">
        <input type="radio" id="sexo" name="sexo" value="Masculino">Masculino
        <input type="radio" id="sexo" name="sexo" value="Feminino">Feminino
        <input type="radio" id="sexo" name="sexo" value="Outro">Outro
        </div>

        <label for="curso">Curso:</label>
        <input type="text" id="curso" name="curso" required>
        
        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" required>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required><br>
        <br>
        
        <input type="submit" value="Cadastrar">
            
        </div>

    </form>
    </div>
    
</body>
</html>