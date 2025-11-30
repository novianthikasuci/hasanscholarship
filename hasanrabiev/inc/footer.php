<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rabiev Hasan Scholarship</title>
  <!-- Menambahkan Font Awesome untuk ikon sosial media -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="path/to/your/css/styles.css"> <!-- Jangan lupa link ke file CSS -->
</head>
<body>

  <!-- Konten utama halaman di sini -->

  <!-- Footer -->
  <footer class="site-footer">
  <div class="footer-container">
    <!-- Kolom Profil -->
    <div class="footer-column">
      <h3><?= htmlspecialchars($t['footer_title'] ?? 'Hasan Scholarship') ?></h3>
      <p><?= htmlspecialchars($t['footer_about_desc'] ?? 'Misi kami adalah membantu talenta muda mengakses pendidikan terbaik di seluruh dunia.') ?></p>
    </div>

    <!-- Kolom Sosial Media -->
    <div class="footer-column">
      <h4><?= htmlspecialchars($t['footer_socials'] ?? 'Ikuti Kami') ?></h4>
      <div class="social-links">
        <a href="https://www.instagram.com/hasan_rbv/" target="_blank" aria-label="Instagram">
          <i class="fab fa-instagram"></i> Instagram
        </a>
        <a href="https://www.facebook.com/share/16Rod1WxtL/?mibextid=wwXIfr" target="_blank" aria-label="Facebook">
          <i class="fab fa-facebook"></i> Facebook
        </a>
        <a href="https://www.linkedin.com/in/hasan-rabiev-20a554270/" target="_blank" aria-label="LinkedIn">
          <i class="fab fa-linkedin"></i> LinkedIn
        </a>
        <a href="https://www.youtube.com/@hasanscholarship" target="_blank" aria-label="YouTube">
          <i class="fab fa-youtube"></i> YouTube
        </a>
      </div>
    </div>

    <!-- Kolom Kontak -->
    <div class="footer-column">
      <h4><?= htmlspecialchars($t['footer_contact'] ?? 'Kontak') ?></h4>
      <p><strong><?= htmlspecialchars($t['footer_email'] ?? 'Email: hasanrabiev123@gmail.com') ?></strong></p>
      <p><strong><?= htmlspecialchars($t['footer_wa'] ?? 'WhatsApp: +992 900 016 225') ?></strong></p>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy; 2025 <?= htmlspecialchars($t['footer_title'] ?? 'Hasan Scholarship') ?></p>
  </div>
</footer>


  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const dropdown = document.getElementById('langDropdown');
      const btn = dropdown.querySelector('.lang-btn');
      btn.addEventListener('click', (e) => {
        e.stopPropagation();
        dropdown.classList.toggle('show');
      });
      document.addEventListener('click', () => dropdown.classList.remove('show'));
    });
  </script>

</body>
</html>
