<?php
require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
}

\Sentry\init([
    'dsn' => $_ENV["SENTRY_DSN"],
]);

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: text/plain");

$smtp_host = $_ENV["SMTP_HOST"];
$smtp_username = $_ENV["SMTP_USERNAME"];
$smtp_password = $_ENV["SMTP_PASSWORD"];
$smtp_port = $_ENV["SMTP_PORT"];
$smtp_from_address = $_ENV["FROM_ADDRESS"];
$smtp_send_address = $_ENV["SEND_ADDRESS"];

$mail = new PHPMailer(true);
//Server settings
$mail->isSMTP();
$mail->Host       = $smtp_host;
$mail->SMTPAuth   = true;
$mail->Username   = $smtp_username;
$mail->Password   = $smtp_password;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = $smtp_port;

function set_SMTP($name, $subject, $template)
{
    global $mail;
    global $smtp_from_address;
    global $smtp_send_address;

    $mail->clearAddresses();
    $mail->setFrom($smtp_from_address, $name);
    $mail->addAddress($smtp_send_address, 'Idance Studio Team');
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $template;

    try {
        $mail->send();
        echo 'success';
    } catch (Exception $ex) {
        echo "Message could not be sent.";
        \Sentry\captureException($ex);
        if (isset($mail)) {
            \Sentry\captureMessage("PHPMailer Error: " . $mail->ErrorInfo);
        }
    }
}

function send_follow_up($name, $send_address, $subject, $template)
{
    global $mail;
    global $smtp_from_address;

    $mail->clearAddresses();
    $mail->setFrom($smtp_from_address, 'Idance Studio Team');
    $mail->addAddress($send_address, $name);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $template;

    try {
        $mail->send();
        // echo 'success';
    } catch (Exception $ex) {
        // echo "Message could not be sent.";
        \Sentry\captureException($ex);
        if (isset($mail)) {
            \Sentry\captureMessage("PHPMailer Error: " . $mail->ErrorInfo);
        }
    }
}



$contact = [
    [
        "value" => "name",
        "type" => "text",
        "fallback" => "Please add your name to continue",
    ],
    [
        "value" => "topic",
        "type" => "select",
        "fallback" => "Please select a topic to continue",
    ],
    [
        "value" => "email",
        "type" => "email",
        "fallback" => "Please add your email to continue",
    ],
    [
        "value" => "subject",
        "type" => "text",
        "fallback" => "Please add a subject to continue",
    ],
    [
        "value" => "message",
        "type" => "text",
        "fallback" => "Please add a message to continue",
    ]
];

$register = [
    [
        "value" => "first_name",
        "type" => "text",
        "fallback" => "Please add your first name to continue",
    ],
    [
        "value" => "last_name",
        "type" => "text",
        "fallback" => "Please add your last name to continue",
    ],
    [
        "value" => "age",
        "type" => "text",
        "fallback" => "Please add your age to continue",
    ],
    [
        "value" => "locations",
        "type" => "select",
        "fallback" => "Please select location(s) to continue",
    ],
    [
        "value" => "mobile_number",
        "type" => "text",
        "fallback" => "Please add your mobile number to continue",
    ],
    [
        "value" => "email",
        "type" => "email",
        "fallback" => "Please add your email to continue",
    ],
    [
        "value" => "message",
        "type" => "text",
        "fallback" => "Please add a message to continue",
    ]
];

function validate_inputs($input)
{
    $response = [
        "status" => true,
        "message" => "",
        "data" => []
    ];
    foreach ($input as $key) {
        if ($key["type"] == "text") {
            if (isset($_POST[$key["value"]]) && !empty($_POST[$key["value"]])) {
                $response["data"][$key["value"]] = htmlspecialchars(trim($_POST[$key["value"]]), ENT_QUOTES, 'UTF-8');
            } else {
                $response["status"] = false;
                $response["message"] = $key["fallback"];
                $response["data"] = [];
                break;
            }
        } else if ($key["type"] == "email") {
            if (isset($_POST[$key["value"]]) && !empty($_POST[$key["value"]])) {
                if (filter_var($_POST[$key["value"]], FILTER_VALIDATE_EMAIL)) {
                    $response["data"][$key["value"]] = htmlspecialchars(trim($_POST[$key["value"]]), ENT_QUOTES, 'UTF-8');
                } else {
                    $response["status"] = false;
                    $response["message"] = "Please add a valid email to continue";
                    $response["data"] = [];
                    break;
                }
            } else {
                $response["status"] = false;
                $response["message"] = $key["fallback"];
                $response["data"] = [];
                break;
            }
        } else if ($key["type"] == "select") {
            if (isset($_POST[$key["value"]]) && !empty($_POST[$key["value"]])) {
                // if (in_array($_POST[$key["value"]], array_column($key["options"], "value"))) {
                //     $response["data"][$key["value"]] = $key["options"][array_search($_POST[$key["value"]], array_column($key["options"], "value"))]["label"];
                // } else {
                //     $response["status"] = false;
                //     $response["message"] = $key["fallback"];
                //     $response["data"] = [];
                //     break;
                // }
                $response["data"][$key["value"]] = htmlspecialchars(trim($_POST[$key["value"]]), ENT_QUOTES, 'UTF-8');
            } else {
                $response["status"] = false;
                $response["message"] = $key["fallback"];
                $response["data"] = [];
                break;
            }
        }
    }
    if ($response["status"]) {
        $response["data"]["datetime"] = date("d M Y \a\\t H.i");
    }
    return $response;
}


if (isset($_POST["execution"]) && $_POST["execution"] == "contact") {
    $response = validate_inputs($contact);
    if ($response["status"]) {
        extract($response["data"]);
        ob_start();
        require_once "contact.php";
        $template = ob_get_clean();
        set_SMTP($name, "Contacting Idance Studio", $template);
        ob_start();
        require_once "follow.php";
        $template_follow_up = ob_get_clean();
        send_follow_up("$name", $email, "Thank you for registering", $template_follow_up);
    } else {
        echo $response["message"];
    }
}

if (isset($_POST["execution"]) && $_POST["execution"] == "register") {
    $response = validate_inputs($register);
    if ($response["status"]) {
        extract($response["data"]);
        $name = "$first_name $last_name";
        ob_start();
        require_once "register.php";
        $template = ob_get_clean();
        set_SMTP($name, "Class Registration", $template);
        ob_start();
        require_once "follow.php";
        $template_follow_up = ob_get_clean();
        send_follow_up($name, $email, "Thank you for registering", $template_follow_up);
    } else {
        echo $response["message"];
    }
}
