<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }

    .main-container {
      display: flex;
      flex-direction: column;
      height: 100%;
      width: 100%;
    }

    .login-form-container {
      max-width: 400px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .login-form-wrapper {
      width: 100%;
      max-width: 380px;
      margin: auto;
    }

    .branding-container {
      display: none;
    }

    .btn-custom-login {
      background-color: #5044e4;
      border: none;
      color: white;
      padding: 0.75rem;
      width: 100%;
      font-size: 1rem;
      border-radius: 2rem;
      font-weight: 700;
      transition: background-color 0.3s;
    }

    .btn-custom-login:hover {
      background-color: #3f38b7;
    }

    .form-control {
      border-radius: 0.5rem;
    }

    .form-control:focus {
      border-color: #5044e4;
      box-shadow: 0 0 0 0.25rem rgba(98, 89, 202, 0.25);
    }

    .invalid-feedback {
      font-size: .875em;
    }

    .fw-bold {
      font-weight: 700 !important;
    }

    .password-wrapper {
      position: relative;
    }

    .password-wrapper .form-control {
      padding-right: 2.5rem;
    }

    #togglePassword {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #6c757d;
    }

    /* Desktop Layout */
    @media (min-width: 992px) {
      .main-container {
        flex-direction: row;
      }

      .login-form-container {
        width: 50%;
        padding: 4rem;
        order: 1;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .branding-container {
        width: 50%;
        color: white;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        flex-direction: column;
        text-align: left;
        background-image: url("{{ asset('img/branding.png') }}"); 
        background-size: cover;
        background-position: center;
        padding-left: 4rem;
        order: 2;
      }

      .branding-container h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
      }

      .branding-container p {
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
      }
    }
  </style>
</head>

<body>
  <div class="main-container">
    
    <!-- Login Form Column -->
    <div class="login-form-container">
      <div class="login-form-wrapper">
        <div class="text-center mb-4">
          <img src="{{ asset('img/sms.jpg') }}" alt="Logo" style="width: 90px;">
          <h2 class="mt-3 fw-bold">Sign in</h2>
        </div>

        <!-- ✅ Laravel Auth Login Form -->
        <form method="POST" action="{{ route('login.submit') }}">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                   id="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
            <div class="password-wrapper">
              <input type="password" class="form-control @error('password') is-invalid @enderror" 
                     id="password" name="password" required>
              <i class="bi bi-eye-slash" id="togglePassword"></i>
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <button type="submit" class="btn btn-custom-login">Sign in</button>
        </form>
      </div>
    </div>

    <!-- Branding Column -->
    <div class="branding-container">
      <h1>School Management<br>System III</h1>
      <p>Center For Research And Development (CRAD)</p>
    </div>
  </div>

  <!-- Toggle Password Visibility -->
  <script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      this.classList.toggle('bi-eye');
      this.classList.toggle('bi-eye-slash');
    });
  </script>
</body>
</html>
