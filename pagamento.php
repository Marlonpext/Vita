<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="pagamento.css">
    <link rel="shortcut icon" href="vital/WhatsApp Image 2023-11-24 at 14.15.35.jpeg" type="x-icon">
    <title> Tela de pagamento</title>
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

.lero {
    max-width: 400px;
    margin: 20px auto;
    padding: 40px; /* Adjusted padding */
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 50px rgba(0, 0, 0, 0.1);
}

.lero h2 {
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



body {
    font-family: 'Nunito', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
}


.pagamento label {
    display: block;
    text-align: left;
    margin-bottom: 8px;
    color: #3A5E9B;
}

.pagamento select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f8f8f8;
    font-size: 16px;
    color: #333;
}

.form-group {
    margin-top: 20px;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="password"],
.form-group input[type="number"],
.form-group input[type="tel"] {
    width: 100%;
    padding: 12px;
    margin-top: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.form-group input[type="submit"] {
    background-color: #3A5E9B;
    color: #fff;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    box-shadow: 0 0 10px 0 rgba(58, 94, 155, 0.5);
    border-radius: 5px;
    font-size: 18px;
    transition: background-color 0.3s ease-in-out;
}

.form-group input[type="submit"]:hover {
    background-color: #265181;
}

.campos {
    margin-top: 20px;
}

.campos label {
    display: block;
    text-align: left;
    margin-bottom: 8px;
    color: #3A5E9B;
}

.campos input[type="text"],
.campos input[type="email"] {
    width: 100%;
    padding: 12px;
    margin-top: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.validade-cvv {
    display: flex;
    justify-content: space-between;
}

.validade,
.cvv {
    flex: 1;
    margin-right: 10px;
}

.validade input,
.cvv input {
    width: 100%;
}
    </style>
</head>
<body>

    <div class="links">   
        <p><img src="vital/pe.png" alt="">VitalAge</p> 
        <a href="paginaprincipal.php">Início</a>

    </div>

    <div class="lero">
        <h2> Tela de pagamento </h2>
        <form method="post" action="profissional.php">
            <div class="pagamento">
                <label for="pagamento">Método de Pagamento:</label>
                <select id="pagamento" name="pagamento" required>
                    <option value="cartao">Cartão de Crédito</option>
                    <option value="boleto">Boleto Bancário</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="campos">
                <div id="cartaoCampos" class="campos-cartao">
                    <label for="numeroCartao">Número do Cartão:</label>
                    <input type="text" id="numeroCartao" name="numeroCartao" placeholder="** ** ** **">
                    <label for="nomeCartao">Nome no Cartão:</label>
                    <input type="text" id="nomeCartao" name="nomeCartao">
                    <div class="validade-cvv">
                        <div class="validade">
                            <label for="validadeCartao">Validade:</label>
                            <input type="text" id="validadeCartao" name="validadeCartao" placeholder="MM/AA">
                        </div>
                        <div class="cvv">
                            <label for="cvv">CVV:</label>
                            <input type="text" id="cvv" name="cvv">
                        </div>
                    </div>
                </div>

                <div id="boletoCampos" class="campos-boleto">
                    <p>Os dados para pagamento via boleto serão enviados para o seu e-mail.</p>
                </div>

                <div id="paypalCampos" class="campos-paypal">
                    <label for="emailPaypal">E-mail do PayPal:</label>
                    <input type="email" id="emailPaypal" name="emailPaypal">
                </div>
            </div>

            <div class="form-group">
                <input type="submit" value="Comprar">
            </div>
        </form>
    </div>

    
</body>
</html>