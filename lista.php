<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="vital/WhatsApp Image 2023-11-24 at 14.15.35.jpeg" type="x-icon">
    <title>Lista de Profissionais</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
            color:#3A5E9B;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        p {
            text-align: center;
        }
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');


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
    margin-left: 20px;
    font-size: 30px;
    font-family: 'Nunito', sans-serif;
    text-decoration: none;
    color: #3A5E9B;

}
.links img{
    width: 45px;
    margin-bottom: -8px;
    margin-left: -20px;
}
.links{
    width: 100%;
    background-color: #E8F4F8;
    margin: 0px 12px;
    margin-top: 0%;
    font-weight: bold;
    margin: 0;
    z-index: 1000;
    margin-bottom: 30px;

    color: #ffffff;
}

.links p{
    background-color: #3A5E9B;
    margin: 0;
    font-size: 40px;
    font-family: 'Nunito', sans-serif;
    
}


.search-title {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
}

.search-form {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}

.search-input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    margin-right: 10px;
    width: 300px;
}

.search-button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.search-button:hover {
    background-color: #0056b3;
}


    </style>
</head>
<body>
<div class="links">   
            <p class="branco"> <img src="vital/pe.png" alt="">    VitalAge</p> 
              <a href=paginaprincipal.php>Início</a>
              <a href="Login.php">Login</a>
              <a href="curso.php">Cursos</a>
      
          </div>

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

// Verifica se o profissional está logado


// Consulta para buscar os profissionais cadastrados
$sql = "SELECT nome, sexo, especialidade, curso, email FROM profissional";
$result = $conn->query($sql);
?>

<?php
$search = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $search = $_POST["search"];

    // Consulta SQL para buscar profissionais pelo nome
    $sql = "SELECT nome, sexo, especialidade, curso, email FROM profissional WHERE nome LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchParam = "%$search%";
    $stmt->bind_param("s", $searchParam);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // Consulta padrão para exibir todos os profissionais
    $sql = "SELECT nome, sexo, especialidade, curso, email FROM profissional";
    $result = $conn->query($sql);
}
?>

<h2 class="search-title">Buscar Profissional por Nome</h2>
<form class="search-form" method="post" action="">
    <input type="text" class="search-input" name="search" placeholder="Digite o nome">
    <button type="submit" class="search-button">Buscar</button>
</form>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Profissionais</title>
</head>
<body>
    <h2>Lista de Profissionais</h2>
    <?php if ($result->num_rows > 0): ?>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Especialidade</th>
            <th>Curso</th>
            <th>Email</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row["nome"]; ?></td>
                <td><?php echo $row["sexo"]; ?></td>
                <td><?php echo $row["especialidade"]; ?></td>
                <td><?php echo $row["curso"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <?php else: ?>
        <p>Nenhum profissional cadastrado.</p>
    <?php endif; ?>
</body>
</html>

<?php
$conn->close();
?>
</body>
</html>