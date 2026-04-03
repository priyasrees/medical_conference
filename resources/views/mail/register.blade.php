<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>RHINOCON 2025 - MAIL</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            margin: 0;
            font-size:15px;
            font-weight:400;
        }

        table {
            border-spacing: 0;
        }

        td {
            padding: 0;
        }

        img {
            border: 0;
        }

        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #e6e6e6;
            padding: 60px 0;
        }

        .main {
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.15);
            color: #000;
            padding: 30px;
            font-family: "Jost", serif;
        }

        .logo {
            text-align: center;
        }

        .mb-30 {
            margin-bottom: 30px;
        }

        .text-center {
            text-align: center;
        }

        .btn-area a {
            text-decoration: none;
            text-align: center;

        }

        .btn {
            color: #fff;
            font-size: 16px;
            line-height: 20px;
            text-transform: uppercase;
            transition: all 0.4s;
            position: relative;
            z-index: 1;
            background: linear-gradient(to right, #AD0E60, #CB2926);
            padding: 13px 16px;
            display: inline-block;
            border-radius: 8px;
            border: none;
            width: auto;

        }
    </style>

</head>

<body>
    <center class="wrapper">
        <table class="main" width="100%">
            <tbody>
                <tr class="mb-30">
                    <td class="logo"><a href="https://rhinocon2025chennai.com/" target="_blank"><img src="https://rhinocon2025chennai.com/public/asset/img/logo.png"
                                width="300" max-width="100%"></a>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 30px 0;">Hi {{ isset($member->name) && !empty($member->name) ? ucfirst($member->name) :'' }} - {{ isset($member->membership_no) && !empty($member->membership_no) ? 'RHIN'.'0000'.$member->id : 'RHIN'.'0000'.$member->id }}, <br />Thank you for registering with RHINOCON 2025! We're
                        excited to have you on board.
                    </td>
                </tr>


                <tr>
                    <td class="btn-area text-center">
                        
                        
                        <a class="btn " href="{{ url('id_card') }}{{ "/".$member->id }}" style="color:white;font-size:14px;">CLICK HERE TO DOWNLOAD YOUR ID CARD</a>
                        
                    </td>
                </tr>


                <tr>
                    <td style="padding: 30px 0;">Regards,<br />Organizing Committee<br />
                        RHINOCON2025
                    </td>
                </tr>
            </tbody>
        </table>
    </center>


</body>

</html>