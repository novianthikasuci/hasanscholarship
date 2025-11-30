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

$page_title = $t['nav_apply'] ?? 'Cara Mendaftar';
include __DIR__ . '/inc/header.php';
?>

<section class="cara-mendaftar">
  <div class="container">

    <!-- Persyaratan untuk S1 (di atas) -->
    <div class="requirements">
        <h2><?= $t['apply_s1_title'] ?? 'Dokumen yang Dibutuhkan untuk S1 🖇📝' ?></h2>
        <div class="boxes">
            <?php
            $s1_docs = $t['apply_s1_docs'] ?? [
                'Pasfoto 3x4',
                'Paspor',
                'Transkrip nilai',
                'Surat keterangan lulus kelas 11',
                'Sertifikat bahasa Inggris',
                'Surat motivasi',
                'Surat rekomendasi',
                'Surat kesehatan',
                'CV (Resume)',
                'Piagam/Penghargaan'
            ];
            foreach ($s1_docs as $doc) {
                echo "<div class='box'>{$doc}</div>";
            }
            ?>
        </div>
        <p class="note"><strong><?= $t['apply_s1_note'] ?? 'Semua dokumen harus diterjemahkan ke dalam bahasa Inggris dan dilegalisasi.' ?></strong></p>
    </div>

    <!-- Persyaratan untuk S2 (di bawah) -->
    <div class="requirements">
        <h2><?= $t['apply_s2_title'] ?? 'Dokumen yang Dibutuhkan untuk S2 🖇📝' ?></h2>
        <div class="boxes">
            <?php
            $s2_docs = $t['apply_s2_docs'] ?? [
                'Pasfoto 3x4',
                'Paspor',
                'Ijazah Sarjana dan Transkrip',
                'Sertifikat bahasa Inggris',
                'Surat motivasi',
                'Surat rekomendasi dari universitas',
                'Surat kesehatan',
                'CV (Resume)',
                'Proposal Penelitian'
            ];
            foreach ($s2_docs as $doc) {
                echo "<div class='box'>{$doc}</div>";
            }
            ?>
        </div>
        <p class="note"><strong><?= $t['apply_s2_note'] ?? 'Semua dokumen harus diterjemahkan ke dalam bahasa Inggris dan dilegalisasi.' ?></strong></p>
    </div>

  </div>
</section>

<?php include __DIR__ . '/inc/footer.php'; ?>
