<?php
session_start();

    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Entrada Errónea</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f5f5f5;
                margin: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                text-align: center;
            }

            .error-message {
                background-color: #fff;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                max-width: 400px;
                width: 100%;
            }

            .error-message h2 {
                color: #d9534f;
            }

            .button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #337ab7;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s;
            }

            .button:hover {
                background-color: #286090;
            }
        </style>
    </head>
    <body>
        <div class='error-message'>
            <h2>Entrada Errónea</h2>
            <p>No has iniciado sesión correctamente.</p>
            <a href='../iniciar_sesion/index.html' class='button'>Ir a Iniciar Sesión</a>
        </div>
    </body>
    </html>";
    exit();
?>
