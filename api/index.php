<?php
require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
}


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
    }
}

// if (isset($_POST["execution"]) && $_POST["execution"] == "contact") {
//     if (isset($_POST["name"]) && !empty($_POST["name"])) {
//         if (isset($_POST["topic"]) && $_POST["topic"] != "0" && !empty($_POST["topic"])) {
//             if (isset($_POST["email"]) && !empty($_POST["email"])) {
//                 //
//                 if (isset($_POST["subject"]) && !empty($_POST["subject"])) {
//                     if (isset($_POST["message"]) && !empty($_POST["message"])) {
//                         $name = $_POST["name"];
//                         if ($_POST["topic"] == 1) {
//                             $topic = "Anmeldung für Probestunde";
//                         } else if ($_POST["topic"] == 2) {
//                             $topic = "Fragen zu Kursen und Zeiten";
//                         } else if ($_POST["topic"] == 3) {
//                             $topic = "Anfrage für private Tanzstunden";
//                         } else if ($_POST["topic"] == 4) {
//                             $topic = "Feedback geben";
//                         } else if ($_POST["topic"] == 5) {
//                             $topic = "Anderes";
//                         }
//                         $email = $_POST["email"];
//                         $subject = $_POST["subject"];
//                         $message = $_POST["message"];
//                         ob_start();
//                         require_once "contact.php";
//                         $template = ob_get_clean();
//                         set_SMTP($name, "Contacting Idance Studio", $template);
//                     } else {
//                         echo ("please add your message");
//                     }
//                 } else {
//                     echo ("please add a subject");
//                 }
//                 //
//             } else {
//                 echo ("you must add your email to continue");
//             }
//         } else {
//             echo ("please select a topic");
//         }
//     } else {
//         echo ("you must add your name to continue");
//     }
// }


// if (isset($_POST["execution"]) && $_POST["execution"] == "register") {
//     if (isset($_POST["first_name"]) && !empty($_POST["first_name"])) {
//         if (isset($_POST["last_name"]) && !empty($_POST["last_name"])) {
//             if (isset($_POST["class_category"]) && !empty($_POST["class_category"]) && $_POST["class_category"] != "0") {
//                 if (isset($_POST["mobile_number"]) && !empty($_POST["mobile_number"])) {
//                     if (isset($_POST["email"]) && !empty($_POST["mobile_number"])) {
//                         $first_name = $_POST["first_name"];
//                         $last_name = $_POST["last_name"];
//                         $class_category = "";
//                         if ($_POST["class_category"] == 1) {
//                             $class_category = "Minis";
//                         } else if ($_POST["class_category"] == 2) {
//                             $class_category = "Kids";
//                         } else if ($_POST["class_category"] == 3) {
//                             $class_category = "Teens";
//                         } else if ($_POST["class_category"] == 4) {
//                             $class_category = "Custom";
//                         }
//                         $mobile_number = $_POST["mobile_number"];
//                         $email = $_POST["email"];
//                         $message = "";
//                         if (isset($_POST["message"]) && !empty($_POST["message"])) {
//                             $message = $_POST["message"];
//                         } else {
//                             $message = "Message is empty!";
//                         }
//                         ob_start();
//                         require_once "register.php";
//                         $template = ob_get_clean();
//                         set_SMTP("$first_name $last_name", "Class Registration", $template);
//                     } else {
//                         echo ("please add a email to continue");
//                     }
//                 } else {
//                     echo ("please add a mobile number to continue");
//                 }
//             } else {
//                 echo ("please add your first name to continue");
//             }
//         } else {
//             echo ("please add your last name to continue");
//         }
//     } else {
//         echo ("please add your first name to continue");
//     }
// }

$contact = [
    [
        "value" => "name",
        "type" => "text",
        "fallback" => "Please add your name to continue",
    ],
    [
        "value" => "topic",
        "type" => "select",
        "options" => [
            [
                "value" => "1",
                "label" => "Anmeldung für Probestunde",
            ],
            [
                "value" => "2",
                "label" => "Fragen zu Kursen und Zeiten",
            ],
            [
                "value" => "3",
                "label" => "Anfrage für private Tanzstunden",
            ],
            [
                "value" => "4",
                "label" => "Feedback geben",
            ],
            [
                "value" => "5",
                "label" => "Anderes",
            ],
        ],
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
        "value" => "class_category",
        "type" => "select",
        "options" => [
            [
                "value" => "1",
                "label" => "Minis",
            ],
            [
                "value" => "2",
                "label" => "Kids",
            ],
            [
                "value" => "3",
                "label" => "Teens",
            ],
            [
                "value" => "4",
                "label" => "Custom",
            ],
        ],
        "fallback" => "Please select a class category to continue",
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
                if (in_array($_POST[$key["value"]], array_column($key["options"], "value"))) {
                    $response["data"][$key["value"]] = $key["options"][array_search($_POST[$key["value"]], array_column($key["options"], "value"))]["label"];
                } else {
                    $response["status"] = false;
                    $response["message"] = $key["fallback"];
                    $response["data"] = [];
                    break;
                }
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
    } else {
        echo $response["message"];
    }
}

if (isset($_POST["execution"]) && $_POST["execution"] == "register") {
    $response = validate_inputs($register);
    if ($response["status"]) {
        extract($response["data"]);
        ob_start();
        require_once "register.php";
        $template = ob_get_clean();
        set_SMTP("$first_name $last_name", "Class Registration", $template);
    } else {
        echo $response["message"];
    }
}
