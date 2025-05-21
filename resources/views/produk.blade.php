
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IwakMart - Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body { background: #f8f9fa; }
        .navbar { background: #c6f3ff; }
        .poster-img { width: 100%; max-height: 350px; object-fit: cover; border-radius: 16px; }
        .produk-card { border-radius: 12px; box-shadow: 0 2px 8px #0001; }
        .produk-img { height: 180px; object-fit: cover; border-radius: 12px 12px 0 0; }
        .produk-title { font-weight: 600; }
        .produk-price { color: #0d6efd; font-weight: bold; }
        .produk-stock { font-size: 0.95em; color: #888; }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg mb-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="https://www.iwakmartrejosari.com/assets/img/logo.png" alt="Logo" width="40" class="me-2">
            <span class="fw-bold">IwakMart</span>
        </a>
        <form class="d-flex mx-auto" style="max-width:400px;">
            <input class="form-control me-2" type="search" placeholder="Cari ikan di fish market" aria-label="Search">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
            <li class="nav-item me-3">
                <a class="nav-link" href="#"><i class="bi bi-cart"></i></a>
            </li>
            <li class="nav-item me-2">
                <button class="btn btn-outline-primary" id="logoutBtn">Logout</button>
            </li>
        </ul>
    </div>
</nav>

<!-- Poster -->
<div class="container mb-4">
    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1200&q=80"
         alt="Poster Ikan" class="poster-img">
</div>

<!-- Produk Section -->
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Daftar Produk</h3>
    </div>
    <div id="produkList" class="row g-4">
        <!-- Produk akan ditampilkan di sini -->
    </div>
</div>

<script>
function getToken() {
    return localStorage.getItem('access_token');
}

function checkLogin() {
    if (!getToken()) {
        window.location.href = '/login';
    }
}
checkLogin();

async function loadProduk() {
    const produkList = document.getElementById('produkList');
    produkList.innerHTML = '<div class="text-center py-5">Loading...</div>';
    try {
        const response = await fetch('/api/admin/products', {
            headers: {
                'Authorization': 'Bearer ' + getToken()
            }
        });
        const data = await response.json();
        let products = [];
        if (response.ok) {
            if (Array.isArray(data)) {
                products = data;
            } else if (data.data && Array.isArray(data.data)) {
                products = data.data;
            }
            if (products.length > 0) {
                produkList.innerHTML = products.map(p => `
                    <div class="col-md-3">
                        <div class="card produk-card h-100">
                            <img src="${p.poster || 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80'}" class="produk-img card-img-top" alt="${p.name || '-'}">
                            <div class="card-body">
                                <div class="produk-title mb-1">${p.name || '-'}</div>
                                <div class="produk-price mb-1">Rp ${p.price || '-'}</div>
                                <div class="produk-stock">Stok: ${p.stock || '-'}</div>
                                <div class="produk-stock">Tipe: ${p.fishType || '-'}</div>
                                <div class="produk-stock">Penjual: ${p.seller || '-'}</div>
                            </div>
                        </div>
                    </div>
                `).join('');
            } else {
                produkList.innerHTML = '<div class="text-center py-5">Tidak ada produk.</div>';
            }
        } else {
            produkList.innerHTML = '<div class="text-center py-5">Gagal mengambil produk.</div>';
        }
    } catch (err) {
        produkList.innerHTML = '<div class="text-center py-5">Terjadi kesalahan.</div>';
    }
}

document.getElementById('logoutBtn').addEventListener('click', function() {
    localStorage.removeItem('access_token');
    window.location.href = '/login';
});

window.onload = loadProduk;
</script>
<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</body>
</html>