<?php
$to = "akademuk24@gmail.com";
$subject = "New message from website contact form";
$name = $_POST["name"];
$phone = $_POST["phone"];
$contactMethod = $_POST["contact-method"];
$telegramChatId = "-921637680";
$telegramBotToken = "2125794009:AAES8WgZDAPqsXQKIyFhd3jg6HXHXbmIm_c";

// Отправить email
$emailHeaders = "From: $name <$phone>" . "\r\n";
$emailHeaders .= "Contact method: $contactMethod" . "\r\n";
mail($to, $subject, $emailHeaders);

// Отправить телеграм-сообщение
$telegramMessage = urlencode("Ім'я: $name\nТелефон: $phone\nЯк зв'язатися: $contactMethod");
$telegramApiUrl = "https://api.telegram.org/bot$telegramBotToken/sendMessage?chat_id=$telegramChatId&text=$telegramMessage";
file_get_contents($telegramApiUrl);

// Вернуть сообщение об успешной отправке
header("Content-type: application/json");
echo json_encode(["message" => "Message sent successfully"]);
?>