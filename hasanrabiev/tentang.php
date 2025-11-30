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


$page_title = $t['about_title'] ?? 'Tentang Kami';  // Default jika tidak ada 'about_title'

include __DIR__ . '/inc/header.php';  // Menyertakan header
?>

<!-- Content -->
<section class="about container fade-in">
  <!-- Profil Agen -->
  <div class="section-header text-center">
    <h2 class="section-title"><?= htmlspecialchars($t['about_profile_title'] ?? 'Profil Agen') ?></h2>
    <p class="section-description"><?= htmlspecialchars($t['about_profile_desc'] ?? 'Kami adalah agensi yang berdedikasi untuk membantu pelamar mendapatkan akses pendidikan melalui beasiswa. Dijalankan oleh tim yang berpengalaman dalam pengurusan beasiswa internasional.') ?></p>
  </div>

  <!-- Visi & Misi -->
  <div class="vision-mission text-center">
    <h3><?= htmlspecialchars($t['about_vision_mission_title'] ?? 'Visi & Misi') ?></h3>
    <p><strong><?= htmlspecialchars($t['about_vision'] ?? 'Visi:') ?></strong> <?= htmlspecialchars($t['about_vision_desc'] ?? 'Mempermudah akses pendidikan untuk talenta berpotensi.') ?></p>
    <p><strong><?= htmlspecialchars($t['about_mission'] ?? 'Misi:') ?></strong> <?= htmlspecialchars($t['about_mission_desc'] ?? 'Menyediakan informasi beasiswa terkini, pendampingan, dan dukungan pasca-terima beasiswa.') ?></p>
  </div>

 <!-- Testimoni -->
<div class="testimonials-wrapper text-center">
  <h3><?= htmlspecialchars($t['about_testimonials_title'] ?? 'Testimoni') ?></h3>
  <div class="testimonials">
    <!-- Eshankulova Mehrona Testimonial -->
    <article class="card testi">
      <div class="card-content">
        <h4>Eshankulova Mehrona</h4>
        <p class="smaller-text"><?= htmlspecialchars($t['about_testimonial_location_mehrona'] ?? 'Information Technology - Indonesia, Yogyakarta') ?></p>
        <p>"<?= htmlspecialchars($t['about_testimonial_mehrona'] ?? '') ?>"</p>
      </div>
    </article>
    <!-- Rabieva Oisha Testimonial -->
    <article class="card testi">
      <div class="card-content">
        <h4>Rabieva Oisha</h4>
        <p class="smaller-text"><?= htmlspecialchars($t['about_testimonial_location_oisha'] ?? 'Information Technology - Indonesia, Yogyakarta') ?></p>
        <p>"<?= htmlspecialchars($t['about_testimonial_oisha'] ?? '') ?>"</p>
      </div>
    </article>
    <!-- Sultonova Khosiyat Testimonial -->
    <article class="card testi">
      <div class="card-content">
        <h4>Sultonova Khosiyat</h4>
        <p class="smaller-text"><?= htmlspecialchars($t['about_testimonial_location_khosiyat'] ?? 'Chemistry Education - Indonesia, Yogyakarta') ?></p>
        <p>"<?= htmlspecialchars($t['about_testimonial_khosiyat'] ?? 'Saya merasa sangat beruntung bisa mendapatkan bantuan dari Akai Hasan dalam mendapatkan beasiswa. Dukungan yang saya terima mempermudah seluruh proses pendaftaran dan persiapan saya untuk studi di luar negeri.') ?>"</p>
      </div>
    </article>
    <!-- Halimov Nematullo Testimonial -->
    <article class="card testi">
      <div class="card-content">
        <h4>Halimov Nematullo</h4>
        <p class="smaller-text"><?= htmlspecialchars($t['about_testimonial_location_nematullo'] ?? 'Management - Madura, Indonesia') ?></p>
        <p>"<?= htmlspecialchars($t['about_testimonial_nematullo'] ?? 'Proses pendaftaran beasiswa sangat terbantu dengan panduan dari Akai Hasan. Semua persiapan saya berjalan lancar dan saya berhasil mendapatkan beasiswa yang sangat saya impikan.') ?>"</p>
      </div>
    </article>
  </div>
</div>


  <!-- Video Testimoni -->
  <div class="video-wrapper text-center">
    <h3><?= htmlspecialchars($t['about_video_title'] ?? 'Video Testimoni') ?></h3>
    <div class="video-container">
      <video width="320" height="570" controls autoplay>
        <source src="video/testimoni.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>
  </div>
</section>

<?php include __DIR__ . '/inc/footer.php'; ?>
