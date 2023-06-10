<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Encurtador de URL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 550px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .container h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 98%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 20px;
            text-align: center;
        }

        .result input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>
<script>
    function formatarData(input) {
      var inputValue = input.value.replace(/\D/g, '');

      if (inputValue.length > 2) {
        inputValue = inputValue.substring(0, 2) + '/' + inputValue.substring(2);
      }
      if (inputValue.length > 5) {
        inputValue = inputValue.substring(0, 5) + '/' + inputValue.substring(5, 9);
      }
      input.value = inputValue;
    }
  </script>

<body>
    <div class="container">
        <h2>Encurtador de URL</h2>
        <form action="encurtador.php" method="POST">
            <div class="form-group">
                <label for="url">URL Original:</label>
                <input type="text" name="url" id="url" required>
            </div>
            <div class="form-group">
                <label for="alias">Alias Personalizado (opcional):</label>
                <input type="text" name="alias" id="alias">
            </div>
            <div class="form-group">
                <label for="expiration">Data de Expiração (opcional):</label>
                <input type="text" oninput="formatarData(this)" placeholder="dd/mm/yyyy" name="expiration" id="expiration">
            </div>
            <div class="form-group">
                <button type="submit">Encurtar</button>
            </div>
        </form>
        <div class="result">
        <?php
            if(isset($_GET['error'])) {
                $errorMessage = $_GET['error'];

                if($errorMessage === 'expiration_invalid') {
                    echo '<div class="error-message">Data de Expiração inválida, deve ser maior ou diferente de hoje.</div>';
                }
               
            }elseif(isset($_GET['shortened_url'])) {
                $shortenedUrl = $_GET['shortened_url'];
                
                if ($shortenedUrl !== 'Alias personalizado já existe.') {
                    $baseUrl = 'http://gabrielDev.com/';
                    echo '<div class="success-message">URL encurtada com sucesso:</div>';
                    echo '<div class="shortened-url">' . $baseUrl . $shortenedUrl . '</div>';
                }else{
                    echo '<div class="error-message">URL Personalizada já existe para este site.</div>';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>