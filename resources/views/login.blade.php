
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login IwakMart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body { background: #f8f9fa; }
    </style>
</head>
<body>
<div class="container" style="max-width: 400px; margin-top: 80px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="mb-4 text-center">Login</h3>
            <div id="alert"></div>
            <form id="loginForm">
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>
<script>
document.getElementById('loginForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    document.getElementById('alert').innerHTML = '';
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    const response = await fetch('/api/auth/login', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ email, password })
    });
    const data = await response.json();

    if (response.ok) {
        // Simpan token ke localStorage dan redirect ke produk
        localStorage.setItem('access_token', data.access_token);
        window.location.href = '/produk';
    } else {
        document.getElementById('alert').innerHTML = '<div class="alert alert-danger">'+(data.message || 'Login gagal')+'</div>';
    }
});
</script>
</body>
</html>