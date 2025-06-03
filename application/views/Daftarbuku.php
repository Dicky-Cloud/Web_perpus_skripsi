<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Pendaftaran</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 800px;
            width: 100%;
        }
        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 25px;
            font-size: 1.2em;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .book-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .book-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }
        .book-title {
            font-weight: bold;
            margin-bottom: 5px;
            color: #2c3e50;
        }
        .book-author {
            color: #7f8c8d;
            font-size: 0.9em;
            margin-bottom: 10px;
        }
        .book-category {
            font-size: 0.85em;
            color: #555;
        }
        .continue-btn {
            display: block;
            background-color: #3498db;
            color: white;
            text-align: center;
            padding: 12px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 30px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .continue-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-message">
            Pendaftaran Berhasil! Selamat Datang di Dinas perpustakaan dan karsipan kabupaten batang
        </div>

        <h1>Daftar Buku Rekomendasi Untuk Anda</h1>
<div class="book-list">
    <?php if (!empty($buku) && is_array($buku)): ?>
        <?php foreach ($buku as $b): ?>
            <div class="book-card">
                <?php if (!empty($b['gambar'])): ?>
                    <img src="<?= base_url('assets/upload/' . $b['gambar']); ?>" alt="<?= htmlspecialchars($b['judul']) ?>" style="width:100%; height:auto; border-radius:5px; margin-bottom:10px;">
                <?php else: ?>
                    <img src="<?= base_url('upload/buku/default.png'); ?>" alt="No Image" style="width:100%; height:auto; border-radius:5px; margin-bottom:10px;">
                <?php endif; ?>

                <div class="book-title"><?= htmlspecialchars($b['judul']) ?></div>
                <div class="book-author"><?= htmlspecialchars($b['penulis']) ?></div>
                <div class="book-category"><?= htmlspecialchars($b['kategori']) ?></div>
                <div><strong>Stok:</strong> <?= intval($b['stok']) ?></div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Tidak ada rekomendasi buku saat ini.</p>
    <?php endif; ?>
</div>
</body>
</html>
