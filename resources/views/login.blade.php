<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: linear-gradient(135deg, #2c2c2c, #1a1a1a);
      color: white;
    }

    .container {
      width: 350px;
      padding: 20px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      text-align: center;
    }

    h2 {
      margin-bottom: 20px;
      font-size: 24px;
      color: #fff;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    input {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.2);
      color: white;
      font-size: 16px;
      outline: none;
    }

    input::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }

    button {
      width: 100%;
      padding: 12px;
      background: #3a3a3a;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      transition: 0.3s;
    }

    button:hover {
      background: #575757;
    }

    p {
      margin-top: 10px;
      font-size: 14px;
    }

    p a {
      color: #ccc;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>LOGIN</h2>
    <form method="POST" action="{{ route('login.submit') }}">
      @csrf
      <input type="text" name="id_user" placeholder="ID User" required>
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Masuk</button>
    </form>

    @if(session('error'))
      <p class="text-danger text-center mt-3">{{ session('error') }}</p>
    @endif
  </div>
</body>
</html>
