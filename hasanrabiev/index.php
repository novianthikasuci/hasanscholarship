<?php
// ===================== CONFIG & LANGUAGE =====================
session_start();

// Jika ada parameter 'lang' di URL, simpan dalam session
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];  // Menyimpan bahasa yang dipilih dalam session
    $url = strtok($_SERVER["REQUEST_URI"], '?');  // Menghapus query string jika ada
    header("Location: $url");  // Redirect ke URL tanpa query parameter
    exit;
}

$lang = $_SESSION['lang'] ?? 'id';  // Menetapkan bahasa default dari session
$supported_langs = ['id', 'en', 'ru', 'tg'];  // Daftar bahasa yang didukung
if (!in_array($lang, $supported_langs)) {
    $lang = 'id'; // Default bahasa Indonesia jika tidak valid
}

$lang_file = __DIR__ . '/lang.json';  // Lokasi file bahasa
$lang_json = json_decode(file_get_contents($lang_file), true);  // Membaca file JSON
$t = $lang_json[$lang] ?? $lang_json['id']; // Fallback ke bahasa ID jika tidak ditemukan

$page_title = $t['home_title'] ?? 'Beranda';  // Menetapkan judul halaman berdasarkan bahasa

include __DIR__ . '/inc/header.php';  // Menyertakan header
?>

<!-- ===================== HERO SECTION ===================== -->
<section class="hero">
  <div class="container">

    <!-- Dua baris hero -->
    <h1 id="hero-text-line1"></h1>
    <h1 id="hero-text-line2"></h1>

    <p><?= htmlspecialchars($t['hero_desc'] ?? 'Mitra terpercaya Anda untuk menemukan dan mendaftar beasiswa internasional terbaik di seluruh dunia.') ?></p>

    <a class="btn btn-primary" href="/hasan-rabiev-scholarship/scholarships.php?lang=<?= $lang ?>">
      <?= htmlspecialchars($t['btn_find_scholarship'] ?? 'Temukan Beasiswa') ?>
    </a>

  </div>
</section>

<script>
  // ==============================
  // Teks dua baris untuk setiap bahasa
  // ==============================
  const lang = "<?= $lang ?>";

  let line1 = "";
  let line2 = "";

  switch(lang) {
    case "en":
      line1 = "Welcome to";
      line2 = "Hasan Scholarship";
      break;
    case "ru":
      line1 = "Добро пожаловать в";
      line2 = "Стипендию Хасана";
      break;
    case "tg":
      line1 = "Хуш омадед ба";
      line2 = "Стипендияи Ҳасан";
      break;
    default: // id
      line1 = "Selamat Datang di";
      line2 = "Hasan Scholarship";
  }

  const target1 = document.getElementById('hero-text-line1');
  const target2 = document.getElementById('hero-text-line2');

  let i = 0;

  function typeLine1() {
    if (i < line1.length) {
      target1.innerHTML += line1.charAt(i);
      i++;
      setTimeout(typeLine1, 100); // delay lambat 100ms
    } else {
      i = 0;
      typeLine2();
    }
  }

  function typeLine2() {
    if (i < line2.length) {
      target2.innerHTML += line2.charAt(i);
      i++;
      setTimeout(typeLine2, 100); // delay lambat 100ms
    }
  }

  typeLine1(); // mulai animasi
</script>




<!-- ===================== HIGHLIGHTED SCHOLARSHIPS (DAFTAR NEGARA DENGAN BENDERA) ===================== -->
<section class="highlights fade-in">
  <div class="container">
   <h2 class="section-title"><?= htmlspecialchars($t['highlight_title'] ?? 'Negara Tujuan Beasiswa') ?></h2>
<p class="section-subtitle"><?= htmlspecialchars($t['highlight_subtitle'] ?? 'Beasiswa tersedia untuk beberapa negara yang bisa Anda daftarkan melalui agensi kami.') ?></p>


    <?php
    $countries = [
        ['name' => 'Indonesia', 'flag' => 'img/id.png'],
        ['name' => 'Qatar', 'flag' => 'img/qa.png'],
        ['name' => 'Saudi Arabia', 'flag' => 'img/sa.png'],
        ['name' => 'United Arab Emirates', 'flag' => 'img/ae.png']
    ];
    ?>

    <ul class="country-list">
      <?php foreach ($countries as $country): ?>
        <li>
          <img src="<?= htmlspecialchars($country['flag']) ?>" alt="<?= htmlspecialchars($country['name']) ?> Flag" class="country-flag" />
          <?= htmlspecialchars($country['name']) ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- ===================== INFO MAHASISWA TERBARU ===================== -->
<section class="student-info">
  <div class="container">
<p><strong><?= htmlspecialchars($t['student_info'] ?? 'Jumlah mahasiswa saat ini: 17 sukses aplikasi di Indonesia.') ?></strong></p>  </div>
</section>

<!-- ===================== WHY CHOOSE US ===================== -->
<section class="why fade-in">
  <div class="container">
    <h2 class="section-title"><?= htmlspecialchars($t['why_title'] ?? 'Mengapa Memilih Kami?') ?></h2>
    <div class="why-grid">
      <div class="why-item">
        <i class="fas fa-user-graduate icon"></i>
        <h3><?= htmlspecialchars($t['why_1_title'] ?? 'Pendampingan Penuh') ?></h3>
        <p><?= htmlspecialchars($t['why_1_desc'] ?? 'Pendampingan Penuh kami membantu Anda dalam setiap tahap aplikasi beasiswa dari riset hingga pengajuan.') ?></p>
      </div>
      <div class="why-item">
        <i class="fas fa-globe icon"></i>
        <h3><?= htmlspecialchars($t['why_2_title'] ?? 'Jaringan Global') ?></h3>
        <p><?= htmlspecialchars($t['why_2_desc'] ?? 'Tim kami memiliki pengalaman internasional dan koneksi langsung dengan universitas terkemuka.') ?></p>
      </div>
      <div class="why-item">
        <i class="fas fa-shield-alt icon"></i>
        <h3><?= htmlspecialchars($t['why_3_title'] ?? 'Data Terverifikasi') ?></h3>
<p><?= htmlspecialchars($t['why_3_desc'] ?? 'Setiap beasiswa yang kami tampilkan sudah diverifikasi agar Anda bisa mendaftar dengan aman.') ?></p>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/inc/footer.php'; ?>
