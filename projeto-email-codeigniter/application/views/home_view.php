<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Faça seu cadastro!</title>
        <style>
                .form-group{
                        background-color: #c3c3c3;
                }               

                .header{
                position: relative;
                background-color: #ff4081;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                text-align: center;
                height: 50px;
                color: white;
                }

                .first-line{
                display: inline-block;
                margin-left: 20px;
                text-align: center;
                color: #000000;
                border-color: black;
                font-family:sans-serif;
                margin-top: 30px;
                margin-left: 100px;
                margin-bottom: 20px;
                }

                .second-line{
                display: inline-block;
                margin-left: 20px;
                text-align: center;
                color: #000000;
                border-color: black;
                font-family:sans-serif;
                margin-top: 30px;
                margin-left: 100px;
                margin-bottom: 20px;
                }

                /* .email{
                width: 350px;
                } */

                .third-line{
                display: inline-block;
                margin-left: 20px;
                text-align: center;
                color: #000000;
                border-color: black;
                font-family:sans-serif;
                margin-top: 30px;
                margin-left: 100px;
                margin-bottom: 20px;
                }

                .cep{
                width: 100px;
                }

                .endereco{
                width: 300px;
                }

                .fourth-line{
                display: inline-block;
                margin-left: 20px;
                text-align: center;
                color: #000000;
                border-color: black;
                font-family:sans-serif;
                margin-top: 30px;
                margin-left: 100px;
                margin-bottom: 20px;
                }

                .uf{
                width: 40px;
                }

                .cidade{
                width: 100px;
                }

                .bairro{
                width: 200px;
                }

                .envio{
                margin-top: 50px;
                margin-left: 45%;
                margin-bottom: 30px;
                background-color: #ff4081;
                border-radius: 5px;
                width: 100px;
                height: 50px;
                color: white;
                }
        </style>
</head>
<body>
    <div class="header">
        <h2>Faça seu cadastro!</h2>
    </div>
    <form class="form-group" method="post">
        <div class="first-line">
                <label for='name'>Nome:</label>
                <input type="text" name="name">
        </div>
        <div class="first-line">
                <label for='second_name'>Sobrenome:</label>
                <input type="text" name="second_name">
        </div>
        <div class="second-line">
                <label for='email'>Email</label>
                <input type="email" name='email'>
        </div>
        <div class="second-line">
                <label for='gender'>Gênero:</label>
                <select name="gender">
                        <?php foreach($genders as $gender): ?>
                                <option value="<?= $gender ?>"><?= $gender ?></option>
                        <?php endforeach ?>
                </select>
        </div>
        <div class="third-line">
                <label>CEP:</label>
                <input type="text" name="cep">
        </div>
        <div class="third-line">
                <label>Endereço:</label>
                <input type="text" name="endereco">
        </div>
        <div class="fourth-line">
                <label>UF:</label>
                <input type="text" name="uf">
        </div>
        <div class="fourth-line">
                <label>Cidade:</label>
                <input type="text" name="cidade">
        </div>
        <div class="fourth-line">
                <label>Bairro:</label>
                <input type="text" name="bairro">
        </div>
        <div class='sub'>
        <input type="submit" value="Enviar" name="enviar" class="envio" >
        </div>
    </form>
</html>
</script>
