<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>
  <!-- Link Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">
</head>
<body>
  <div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card p-4 shadow-lg" style="width: 400px;">
      <h3 class="text-center mb-4">Register</h3>
      <form action="{{ route('register.post') }}" method="POST">
        @csrf

        <!-- iduser Input -->
        <div class="mb-3">
          <label for="iduser" class="form-label">Iduser</label>
          <input type="number" class="form-control" name="iduser" id="iduser"
placeholder="Masukkan iduser" required minlength="10" maxlength="10">
        </div>
        @error('iduser')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Nama Input -->
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama"
placeholder="Masukkan Nama Lengkap" required>
        </div>
        @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Password Input -->
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password"
placeholder="Masukkan Password" required>
        </div>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Confirm Password Input -->
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" name="password_confirmation"
id="confirmPassword" placeholder="Konfirmasi Password" required>
        </div>
        @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">Register</button>

        <!-- Additional Links -->
        <div class="text-center mt-3">
            <span>Sudah punya akun?</span>
          <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Link Bootstrap JS and Popper.js -->
  <script
src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
