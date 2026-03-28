<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+HarunoUmi:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Idance Studio | Thank You</title>
</head>

<body style="margin: 0;padding: 0;box-sizing: border-box;">
    <div style="width: 100%;max-width: 600px;min-height: 100vh;height: auto;background-color: #e7e1ea;margin-left: auto;margin-right: auto;box-sizing: border-box;">
        <table style="width: 100%;">
            <tr>
                <td>
                    <div style="width: 100%;height: auto;background-color: #6a5a72;">
                        <img src="https://idance-studio-mailer.vercel.app/logo.png" style="width: 250px; margin-left: auto;margin-right: auto;display: block;">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="width: 90%;margin-left: auto;margin-right: auto;">
                        <p style="font-family: 'Kaisei HarunoUmi', serif;font-size: 16px;font-weight: 400;margin-top: 3.5rem;color: #6a5a72;text-align: center; letter-spacing: 2px;">
                            THANK YOU
                        </p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="width: 90%;margin-left: auto;margin-right: auto;">
                        <p style="font-family: 'Kaisei HarunoUmi', serif;font-size: 16px;font-weight: 400;margin-top: 3.5rem;color: #6a5a72;text-align: left;line-height: 2.5;">
                            Dear
                            <span style="font-weight: bold;font-style: italic;font-size: 18px;padding: 0 5px;"><?php echo $name; ?></span>, <br><br>

                            Thank you for reaching out to us. We’ve received your message and truly appreciate you taking the time to connect with our studio. <br><br>

                            Our team is currently reviewing your inquiry, and we will be in touch shortly to help you find your rhythm with us. Whether it’s a question or a new beginning, we look forward to the conversation. <br><br>

                            With grace and rhythm, <br>
                            <span style="font-weight: bold;font-style: italic;font-size: 18px;">The Idance Studio Team</span><br>
                            <span><?php echo $datetime; ?></span>
                        </p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="width: 90%;margin-left: auto;margin-right: auto;margin-top: 5rem;">
                        <p style="font-family: 'Kaisei HarunoUmi', serif;font-size: 12px;font-weight: 400;margin-top: 3.5rem;color: #6a5a72;text-align: center;margin-bottom: 2rem;">
                            Copyright &copy; 2026 Idance Studio. All rights reserved
                        </p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>