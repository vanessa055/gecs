<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../src/features/authentication/frontend/styles/login.css">
  <!-- Iconos de fontawesome -->
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <!-- Lado izquierdo -->
      <div class="login">
        <h2>Login</h2>
        <form>
          <div class="input-box">
            <input type="text" placeholder="Username" required>
            <i class="fas fa-user"></i>
          </div>
          <div class="input-box">
            <input type="password" placeholder="Password" required>
            <i class="fas fa-lock"></i>
          </div>
          <button type="submit" class="btn">Login</button>
        </form>
        <p class="signup-text">
          Don’t have an account? <a href="#">Sign Up</a>
        </p>
      </div>

    
    </div>
  </div>
</body>
</html>
