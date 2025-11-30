<?php
// ===================== CONFIG & LANGUAGE =====================
session_start();

// Jika ada parameter 'lang' di URL, simpan dalam session
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];  // Simpan pilihan bahasa
    $url = strtok($_SERVER["REQUEST_URI"], '?'); // Bersihkan query
    header("Location: $url");
    exit;
}

// Gunakan bahasa dari session, atau default 'id'
$lang = $_SESSION['lang'] ?? 'id';

$supported_langs = ['id', 'en', 'ru', 'tg'];
if (!in_array($lang, $supported_langs)) {
    $lang = 'id';
}

// Load file bahasa
$lang_file = __DIR__ . '/lang.json';
$lang_json = json_decode(file_get_contents($lang_file), true);
$t = $lang_json[$lang] ?? $lang_json['id'];

// Judul halaman
$page_title = $t['contact_title'] ?? 'Kontak Kami';
?>

<?php include __DIR__ . '/inc/header.php'; ?>

<section class="contact-section">
    <div class="container">
        <h1 class="section-title"><?= htmlspecialchars($t['contact_title']) ?></h1>
        <p class="section-subtitle"><?= htmlspecialchars($t['contact_desc']) ?></p>

        <div class="contact-buttons">
            <!-- WhatsApp Button -->
            <div class="contact-item">
                <a href="https://wa.me/992900016225?text=<?= urlencode($t['contact_wa_text']) ?>" target="_blank">
                    <button class="btn-primary"><?= htmlspecialchars($t['contact_whatsapp']) ?></button>
                </a>
            </div>

            <!-- Email Button -->
            <div class="contact-item">
                <a href="mailto:hasanrabiev123@gmail.com?subject=<?= urlencode($t['contact_email_subject']) ?>&body=<?= urlencode($t['contact_email_body']) ?>" target="_blank">
                    <button class="btn-primary"><?= htmlspecialchars($t['contact_email']) ?></button>
                </a>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/inc/footer.php'; ?>
