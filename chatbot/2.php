<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Chatbot</title>
</head>

<body>

    <div class="main">
        <div class="chat-container">
            <h4>PERSONAL CHATBOT</h4>
            <div id="boxMsgs" class="chat-box">
                <!-- <div class="bot-msg">
                    Hola.. bienvenido. <br>
                    Ingresa '1' para iniciar el chat..
                </div> -->

            </div>
            <div class="form">
                <h5>Su texto aquí...</h5>
                <form id="form" action="">
                    <input type="text" name="userInput" id="userInput" placeholder="Escriba su mensaje aquí" autocomplete="off">
                    <button>Enviar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="app.js"></script>
</body>

</html>