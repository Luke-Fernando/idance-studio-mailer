<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+HarunoUmi:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Idance Studio | Vielen Dank</title>
</head>

<body style="margin: 0;padding: 0;box-sizing: border-box;">
    <div style="width: 100%;max-width: 600px;min-height: 100vh;height: auto;background-color: #e7e1ea;margin-left: auto;margin-right: auto;box-sizing: border-box; padding-bottom: 40px;">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="background-color: #6a5a72; padding: 20px 0;">
                    <img src="https://idance-studio-mailer.vercel.app/logo.png" style="width: 250px; margin-left: auto;margin-right: auto;display: block;" alt="Idance Studio Logo">
                </td>
            </tr>

            <tr>
                <td>
                    <div style="width: 85%;margin-left: auto;margin-right: auto; padding-top: 2rem;">
                        <p style="font-family: 'Kaisei HarunoUmi', serif;font-size: 16px;font-weight: 400;color: #6a5a72;text-align: left;line-height: 1.8;">
                            Hallo <span style="font-weight: bold;"><?php echo $name; ?></span> 😊,<br><br>

                            vielen Dank für Ihre Nachricht und Ihr Interesse an unserem Angebot!<br><br>

                            Ihre Anfrage ist bei uns erfolgreich eingegangen. <br>
                            Wir melden uns so schnell wie möglich bei Ihnen.<br><br>

                            Liebe Grüße,<br>
                            <span style="font-weight: bold;">Idance Studio</span>
                        </p>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div style="width: 85%; margin: 2rem auto; border-top: 1px solid #6a5a72; opacity: 0.3;"></div>
                </td>
            </tr>

            <tr>
                <td>
                    <div style="width: 85%;margin-left: auto;margin-right: auto;">
                        <p style="font-family: 'Kaisei HarunoUmi', serif;font-size: 15px;font-weight: 400; font-style: italic; color: #6a5a72;text-align: left;line-height: 1.8; opacity: 0.8;">
                            Hello 😊,<br><br>

                            thank you very much for your message and your interest in our classes!<br><br>

                            Your inquiry has been received successfully. <br>
                            We will get back to you as soon as possible.<br><br>

                            Best regards,<br>
                            <span style="font-weight: bold;">Idance Studio</span>
                        </p>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div style="width: 90%;margin-left: auto;margin-right: auto;margin-top: 3rem;">
                        <p style="font-family: 'Kaisei HarunoUmi', serif;font-size: 12px;font-weight: 400;color: #6a5a72;text-align: center;">
                            <?php echo $datetime; ?><br><br>
                            Copyright &copy; 2026 Idance Studio. All rights reserved
                        </p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>