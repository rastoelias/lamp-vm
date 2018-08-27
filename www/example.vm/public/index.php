<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Example site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        *,
        *::before,
        *::after { 
            box-sizing: border-box;
        }
        html,
        body{
            margin: 0;
            padding: 0;
            width: 100%;
        }
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 0;
            margin: 0;
            background: #1563FF;
            color: #FFF;
            text-align: center;
        }
        .container{
            padding: 2rem;
            max-width: 400px;
            margin: auto;
            display: flex;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <h1>Example site</h1>
            <p>This is the page used to test the correct operation of the LAMP VM.</p>
        </div>
    </div>
</body>
</html>