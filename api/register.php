<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+HarunoUmi:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Idance Studio | Class Register</title>
</head>

<body style="margin: 0;padding: 0;box-sizing: border-box;">
    <div style="width: 100%;max-width: 600px;min-height: 100vh;height: auto;background-color: #e7e1ea;margin-left: auto;margin-right: auto;box-sizing: border-box;">
        <table style="width: 100%;">
            <!-- logo -->
            <tr>
                <div style="width: 100%;height: auto;background-color: #6a5a72;">
                    <img src="https://idance-studio-mailer.vercel.app/logo.png" style="width: 250px; margin-left: auto;margin-right: auto;display: block;">
                </div>
            </tr>
            <!-- logo -->
            <tr>
                <div style="width: 90%;margin-left: auto;margin-right: auto;">
                    <p style="font-family: 'Kaisei HarunoUmi', serif;font-size: 16px;font-weight: 400;margin-top: 3.5rem;color: #6a5a72;text-align: center;">
                        Class Regitration
                    </p>
                </div>
            </tr>
            <!--  -->
            <tr>
                <div style="width: 90%;margin-left: auto;margin-right: auto;">
                    <p style="font-family: 'Kaisei HarunoUmi', serif;font-size: 16px;font-weight: 400;margin-top: 3.5rem;color: #6a5a72;text-align: left;line-height: 2.5;">
                        Hello Idance Team,<br><br>

                        My name is
                        <span style="font-weight: bold;font-style: italic;font-size: 18px;padding: 0 5px;"><?php echo $first_name . " " . $last_name; ?></span>
                        (Age: <span style="font-weight: bold;font-style: italic;font-size: 18px;padding: 0 5px;"><?php echo $age; ?></span>),
                        and I’m excited to take a step into your world of dance.<br>

                        You can reach me at
                        <span style="font-weight: bold;font-style: italic;font-size: 18px;padding: 0 5px;"><?php echo $mobile_number; ?></span>
                        or
                        <span style="font-weight: bold;font-style: italic;font-size: 18px;padding: 0 5px;"><?php echo $email; ?></span>
                        — whichever is easier for you. <br>

                        Here’s a little note from me: <br>

                        “<span style="font-weight: bold;font-style: italic;font-size: 18px;padding: 0 5px;"><?php echo $message; ?></span>”<br>

                        Looking forward to moving, learning, and growing with you! <br>

                        With excitement, <br>
                        <span style="font-weight: bold;font-style: italic;font-size: 18px;padding: 0 5px;"><?php echo $first_name . " " . $last_name; ?></span><br>
                        <span><?php echo $datetime; ?></span>
                    </p>
                </div>
            </tr>
            <!--  -->
            <!-- footer  -->
            <tr>
                <div style="width: 90%;margin-left: auto;margin-right: auto;margin-top: 5rem;">
                    <p style="font-family: 'Kaisei HarunoUmi', serif;font-size: 12px;font-weight: 400;margin-top: 3.5rem;color: #6a5a72;text-align: center;margin-bottom: 0;">
                        Copyright &copy; 2025 Idance Studio. All rights reserved
                    </p>
                </div>
            </tr>
            <!-- footer  -->
        </table>
    </div>
</body>

</html>