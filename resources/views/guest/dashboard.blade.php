<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voctech</title>
    <link rel="icon" href="{{ asset('image/30441-removebg-preview (1).png') }}" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: 'Arial', sans-serif;
            color: white;
        }

                body {
            background: linear-gradient(rgba(18, 18, 43, 0.7), rgba(18, 18, 43, 0.7)),
                        url("{{ asset('Image/b99bd1e3-f92c-4e2d-8d84-45ed65b238eb.jpeg') }}");
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .dashboard {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 40px;
            margin-right: 50px;
        }

        .dashboard h1 {
            font-size: 2em;
            letter-spacing: 1px;
        }

        .qr-container {
    position: relative;
    display: inline-block;
    margin-top: 30px;
    margin-left:  5px;
    }

    .qr-box {
        position: relative;
        padding: 60px;
        background: transparent;
    }

    .qr-box::before, .qr-box::after {
        content: '';
        position: absolute;
        width: 30px;
        height: 30px;
        border: 5px solid white;
    }

    .qr-box::before {
        top: 0;
        left: 0;
        border-right: none;
        border-bottom: none;
    }

    .qr-box::after {
        bottom: 0;
        right: 0;
        border-left: none;
        border-top: none;
    }

    .qr-code {
        background: white;
        padding: 10px;
        display: inline-block;
    }

    .scan-btn {
        position: absolute;
        right: -140px; 
        top: 50%;
        transform: translateY(-50%);
        background: white;
        color: black;
        padding: 12px 30px;
        font-weight: bold;
        font-size: 1rem;
        clip-path: polygon(0 0, 90% 0, 100% 50%, 90% 100%, 0 100%);
        border: none;
        white-space: nowrap;
    }
     .note {
     font-size: 1rem;
        margin-top: 10px;
     }
     .top-header {
    position: absolute;
    top: 20px;
    right: 40px;
    z-index: 1000;
    font-size: 1rem;
}

.top-header a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    border: 2px solid white;
    padding: 8px 16px;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.top-header a:hover {
    background-color: white;
    color: #12122b; 
}

    </style>
</head>
<body>
<header class="top-header">
    <a href="{{ route('login') }}">Login</a>
</header>

<div class="dashboard">
    <h1>WELCOME TO THE GUEST DASHBOARD!</h1>

    <div class="qr-container">
        <div class="qr-box">
            <div class="qr-code">
                {!! QrCode::size(250)->generate('https://www.voctech-academy.com/') !!}
            </div>
        </div>
        <button class="scan-btn">SCAN ME</button>
    </div>

    <p class="note">To access the Visitors Registration Form</p>
</div>


</body>
</html>
