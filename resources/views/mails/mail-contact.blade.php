<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <style>
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffeee6;
            padding: 24px;
            border-radius: 10px;
        }

        img {
            width: 80px !important;
            height: auto !important;
            margin: 0 0 12px;
        }

        p {
            font-size: 13px;
            color: #36474F;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="https://kolkatasteelassociates.com/logo.png" alt="Kolkata Steel Associates">
        <p>Hi,</p>
        <p>A contact request has been made. For details, check below:</p>
        <table style="width: 100%; border-collapse: collapse; font-size: 13px; color: #36474F;">
            <tbody>
                <tr>
                    <td colspan="2" style="padding: 8px; border: 1px solid #ccc;">
                        <strong>Name:</strong> {{ $name }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 8px; border: 1px solid #ccc;">
                        <strong>Phone:</strong> {{ $phone }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 8px; border: 1px solid #ccc;">
                        <strong>Email:</strong> {{ $email }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 8px; border: 1px solid #ccc;">
                        <strong>Subject:</strong> {{ $subject }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 8px; border: 1px solid #ccc;">
                        <strong>Message:</strong>
                        <p>{{ $note }}</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
