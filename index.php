<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Encurtador de URL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./style.css">

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
    <div class="wrapper">
    <nav>
        <div class="social-links">
            <a href="https://twitter.com/GbrlszC"  target="_blank">
                <i class="fab fa-twitter"></i>
                Twitter
            </a>
            <span class="spacer"></span>
            <a href="https://www.facebook.com/gabriel.costasaucedo/"  target="_blank">
                <i class="fab fa-facebook"></i>
                Facebook
            </a>
        </div>
    </nav>
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

                } elseif(isset($_GET['shortened_url'])) {
                    $shortenedUrl = $_GET['shortened_url'];

                    if ($shortenedUrl !== 'Alias personalizado já existe.') {
                        $baseUrl = 'https://encurtador.up.railway.app/';
                        echo '<div class="success-message">URL encurtada com sucesso:</div>';
                        echo '<div class="shortened-url">' . $baseUrl . $shortenedUrl . '</div>';
                    } else {
                        echo '<div class="error-message">URL Personalizada já existe para este site.</div>';
                    }
                }
                ?>
            </div>
        </div>
        <footer>
            <p>Desenvolvido por <a href="https://github.com/zbillydim"  target="_blank">Gabriel C.</a></p>
            <p>
                <i class="fab fa-github github-icon"></i>
                <a href="https://github.com/zbillydim"  target="_blank">GitHub</a>
            </p>
        </footer>
    </div>
</body>
</html>
