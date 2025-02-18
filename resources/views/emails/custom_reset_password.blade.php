<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wachtwoord reset aanvragen</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Lato', sans-serif; background-color: #F5F5F5; color: #333; font-size: 16px;">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #F5F5F5; padding: 20px;">
        <tr>
            <td align="center">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                    <!-- Header -->
                    <tr>
                        <td align="center" style="border-bottom: 2px solid #333333; padding-bottom: 10px;">
                            <h1 style="color: #be3144; font-size: 24px; margin: 0;">Wachtwoord Reset</h1>
                        </td>
                    </tr>
                    <!-- Content -->
                    <tr>
                        <td style="padding-top: 20px; padding-bottom: 20px; padding-left:0px; padding-right: 0px;">
                            <p style="margin: 0 0 15px;">Hallo {{ $first_name }},</p>
                            <p style="margin: 0 0 15px;">Je ontvangt deze e-mail omdat we een verzoek hebben ontvangen om je wachtwoord opnieuw in te stellen.</p>
                            <p style="margin: 0 0 15px;">Klik op de onderstaande knop om je wachtwoord opnieuw in te stellen:</p>
                            <p style="text-align: center; margin: 20px 0;">
                                <a href="{{ $url }}" style="display: inline-block; background: #be3144; color: #ffffff; padding: 12px 24px; text-decoration: none; font-size: 16px; font-weight: 400; border-radius: 5px;">Reset Wachtwoord</a>
                            </p>
                            <p style="margin: 0 0 15px;">Deze link verloopt over <strong>{{ config('auth.passwords.'.config('auth.defaults.passwords').'.expire') }}</strong> minuten.</p>
                            <p style="margin: 0 0 15px;">Als je geen wachtwoordreset hebt aangevraagd, kun je deze e-mail negeren.</p>

                            <!-- Alternatieve link als de knop niet werkt -->
                            <p style="margin-top: 20px; font-size: 14px; color: #555;">
															Werkt de knop niet? Kopieer en plak de volgende link in je browser:
														</p>
														<p style="word-wrap: break-word; font-size: 14px; color: #555; text-align: center;">
																<a href="{{ $url }}" style="color: #be3144; text-decoration: none; word-break: break-all;">{{ $url }}</a>
														</p>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td align="center" style="font-size: 14px; color: #777; border-top: 1px solid #ddd; padding-top: 10px;">
                            <p style="margin: 0;">Met vriendelijke groet,<br><strong>{{ config('app.name') }}</strong></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- Media Query for Responsive Design -->
    <style>
        @media screen and (max-width: 600px) {
            table[role="presentation"] {
                width: 100% !important;
            }
            h1 {
                font-size: 20px !important;
            }
            p {
                font-size: 14px !important;
            }
            a {
                font-size: 14px !important;
                padding: 10px 18px !important;
            }
        }
    </style>
</body>
</html>
