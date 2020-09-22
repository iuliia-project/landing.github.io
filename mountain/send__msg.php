<?
function cors() {
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        exit(0);
    }
}

cors();
ini_set('display_errors','On');
error_reporting('E_ALL');



$name = $_POST['name'];
$contact = $_POST['contact'];
$text = $_POST['text'];

$name = htmlspecialchars($name);
$contact = htmlspecialchars($contact);
$text = htmlspecialchars($text);

$name = urldecode($name);
$contact = urldecode($contact);
$text = urldecode($text);

$name = trim($name);
$contact = trim($contact);
$text = trim($text);

echo $name;
echo "<br>";
echo $contact;
echo "<br>";
echo $text;

if (mail("sobjulia89@gmail.com", "Заявка с сайта", "Имя:".$name."\n контакт:".$contact."\n Текст: ".$text."  " ,"From: sob-julia@mail.ru \r\n")) {
    echo "Сообщение успешно отправлено";
} else {
    echo "При отправке сообщения возникли ошибки";
}

?>