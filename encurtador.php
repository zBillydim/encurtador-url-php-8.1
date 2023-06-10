<?php
include("./conexao/conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['url'];
    $customAlias = $_POST['alias'];
    $expirationDate = $_POST['expiration'];
    $dataObj = DateTime::createFromFormat('d/m/Y', $expirationDate);
    $expirationDate = $dataObj->format('Y-m-d H:i:s');
    $data = date('Y-m-d H:i:s');
    
    if (strtotime($expirationDate) < strtotime($data)) {
        $error = 'expiration_invalid';
        header("Location: index.php?error=$error");
        exit;
    }

    $shortenedUrl = shortenURL($url, $customAlias, $expirationDate);

    // Redirecionar para a página inicial com a URL encurtada
    header("Location: index.php?shortened_url=$shortenedUrl");
    exit;
}else{
    return array('err' => 'true', 'msg' => 'Método não permitido, utilize POST');
}

function generateShortCode($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charLength = strlen($characters);
    $shortCode = '';
    for ($i = 0; $i < $length; $i++) {
        $shortCode .= $characters[rand(0, $charLength - 1)];
    }
    return $shortCode;
}

function shortenURL($url, $customAlias = '', $expirationDate = '') {
    $conexao = conectaDb();

    if (!empty($customAlias)) {
        $checkQuery = "SELECT * FROM meubanco_urls WHERE custom_url = '$customAlias'";
        $result = $conexao->query($checkQuery);

        if (mysqli_num_rows($result) > 0) {
            return 'Alias personalizado já existe.';
        }
    }

    $shortCode = !empty($customAlias) ? $customAlias : generateShortCode();

    $insertQuery = "INSERT INTO meubanco_urls (original_url, shortened_url, custom_url, expiration_date) VALUES ('$url', '$shortCode', '$customAlias', '$expirationDate')";
    $conexao->query($insertQuery);

    return $shortCode;
}


?>