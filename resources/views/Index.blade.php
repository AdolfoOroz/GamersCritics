<!--@extends('layouts.app')-->

<html>
<head>
<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            
            html, body {
                background-color: #fff;
                /*color: #636b6f;*/
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            div.Header
            {
                background: #85F0F1; padding: 10px 10px 10px 10px; display: flex;
            }  
                img.imginicio
                {
                    display: block; text-align: left; padding-top: 10px; padding-left: 30px
                }
                div.Login
                {
                    display: inline; text-align: right; padding-top: 15px;
                }
                    td.login
                    {
                        border-left: 15px;
                    }
                div.EmptyHead
                {
                    display: block; text-align: center; width: 30%;
                }
        </style>
</head>

<body>
	<div class="Header">
        <img class="imginicio" src="GamersCritics\resources\views\imgimg/7b9.jpg" alt="HTML 5 Logo" height="80" width="70">
        <div class="EmptyHead"> </div>
        <div class="Login">
            <table>
                <tr>
                    <td class="login">
                        <input type="text" name="search" width="80%">
						<input type="button" value="Search" name="btnsearch">
                    </td>
                    <td class="login">
                        <input type="button" value="Profile" name="btnprofile">
						<input type="button" value="Log Out" name="btnlogout">
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>