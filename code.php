<?php
$botToken = "7783708130:AAH4QbNfM7ImpXBQEQ2OboplV7UlZqillwM";
$website = "https://api.telegram.org/bot" . $botToken;

$update = file_get_contents("php://input");
$updateArray = json_decode($update, TRUE);

$chatId = $updateArray["message"]["chat"]["id"];
$messageText = $updateArray["message"]["text"];

if ($messageText === "/start") {
    $responseText = "Hello";
    file_get_contents($website . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($responseText));
}
?>