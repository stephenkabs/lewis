<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Inactive</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #054d05, #034404);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        .container {
            text-align: center;
            background: #fff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            font-size: 24px;
            color: #727272;
        }
        .container p {
            font-size: 16px;
            margin: 15px 0;
        }
        .contact-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #dc8a05;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .contact-btn:hover {
            background-color: #b36800;
        }
    </style>
</head>
<body>
    <div class="container">


        <button style="background: none; border: none; cursor: default; font-size: 40px; color: #888888;">
            <i class="fas fa-lock"></i>
        </button>
        <h1>Contact Us</h1>
        <p>Please contact the administrator for Account Creation.</p>
        <a href="/" class="contact-btn"
          >
            Home
        </a>
        {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form> --}}
    </div>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</body>
</html>
