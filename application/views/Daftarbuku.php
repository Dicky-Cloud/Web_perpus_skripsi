<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Notifikasi Pendaftaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>

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
      max-width: 1000px;
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
    .category-menu {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 1px solid #eee;
    }
    .category-btn {
      padding: 8px 15px;
      background-color: #e0e0e0;
      border: none;
      border-radius: 20px;
      cursor: pointer;
      transition: all 0.3s;
    }
    .category-btn:hover {
      background-color: #d0d0d0;
    }
    .category-btn.active {
      background-color: #3498db;
      color: white;
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
      overflow: hidden;
      transition: transform 0.3s, box-shadow 0.3s;
      display: flex;
      flex-direction: column;
      height: 100%;
    }
    .book-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }
    .book-cover-container {
      width: 100%;
      height: 0;
      padding-bottom: 150%;
      position: relative;
      overflow: hidden;
    }
    .book-cover {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s;
    }
    .book-card:hover .book-cover {
      transform: scale(1.05);
    }
    .book-info {
      padding: 15px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }
    .book-title {
      font-weight: bold;
      margin-bottom: 5px;
      color: #2c3e50;
      font-size: 0.95em;
    }
    .book-author {
      color: #7f8c8d;
      font-size: 0.85em;
      margin-bottom: 10px;
    }
    .book-meta {
      margin-top: auto;
      display: flex;
      justify-content: space-between;
      font-size: 0.8em;
    }
    .book-category {
      color: #555;
      background-color: #f0f0f0;
      padding: 2px 6px;
      border-radius: 3px;
    }
    .book-stock {
      color: #388e3c;
    }
    .no-books {
      text-align: center;
      color: #7f8c8d;
      font-style: italic;
      padding: 40px;
      grid-column: 1 / -1;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="success-message">
      Pendaftaran Berhasil! Selamat Datang di Dinas Perpustakaan dan Kearsipan Kabupaten Batang
    </div>

    <h1>Daftar Buku</h1>

    <!-- Search Bar -->
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Cari judul atau penulis..." id="searchInput">
    </div>

    <!-- Menu Kategori -->
    <div class="category-menu" id="categoryMenu">
      <button class="category-btn active" data-category="all">Semua</button>
      <?php 
      $categories = [];
      if (!empty($buku) && is_array($buku)) {
          foreach ($buku as $b) {
              $category = $b['kategori'] ?? 'Lainnya';
              if (!in_array($category, $categories)) {
                  $categories[] = $category;
              }
          }
      }
      foreach ($categories as $cat): ?>
          <button class="category-btn" data-category="<?= htmlspecialchars(str_replace(' ', '-', strtolower($cat))) ?>">
              <?= htmlspecialchars($cat) ?>
          </button>
      <?php endforeach; ?>
    </div>

    <!-- Daftar Buku -->
    <div class="book-list" id="bookList">
      <?php if (!empty($buku) && is_array($buku)): ?>
        <?php foreach ($buku as $b): 
          $category_class = str_replace(' ', '-', strtolower($b['kategori'] ?? 'lainnya'));
        ?>
          <div class="book-card" data-category="<?= htmlspecialchars($category_class) ?>" data-title="<?= strtolower($b['judul']) ?>" data-author="<?= strtolower($b['penulis']) ?>">
            <div class="book-cover-container">
              <img src="<?= base_url('assets/upload/' . ($b['gambar'] ?: 'default.png')) ?>" alt="<?= htmlspecialchars($b['judul']) ?>" class="book-cover">
            </div>
            <div class="book-info">
              <div class="book-title"><?= htmlspecialchars($b['judul']) ?></div>
              <div class="book-author"><?= htmlspecialchars($b['penulis']) ?></div>
              <div class="book-meta">
                <span class="book-category"><?= htmlspecialchars($b['kategori'] ?? 'Lainnya') ?></span>
                <span class="book-stock">Stok: <?= intval($b['stok']) ?></span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="no-books">Tidak ada rekomendasi buku saat ini.</div>
      <?php endif; ?>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const categoryButtons = document.querySelectorAll('.category-btn');
      const bookCards = document.querySelectorAll('.book-card');
      const searchInput = document.getElementById('searchInput');

      let selectedCategory = 'all';

      categoryButtons.forEach(button => {
        button.addEventListener('click', function () {
          categoryButtons.forEach(btn => btn.classList.remove('active'));
          this.classList.add('active');
          selectedCategory = this.dataset.category;
          filterBooks();
        });
      });

      searchInput.addEventListener('input', filterBooks);

      function filterBooks() {
        const query = searchInput.value.toLowerCase();

        bookCards.forEach(card => {
          const title = card.dataset.title;
          const author = card.dataset.author;
          const category = card.dataset.category;

          const matchesCategory = selectedCategory === 'all' || category === selectedCategory;
          const matchesSearch = title.includes(query) || author.includes(query);

          if (matchesCategory && matchesSearch) {
            card.style.display = 'flex';
          } else {
            card.style.display = 'none';
          }
        });
      }
    });
  </script>
</body>
</html>
