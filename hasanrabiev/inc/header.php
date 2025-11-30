<?php
$current_page = basename($_SERVER['PHP_SELF']);
$lang = $_SESSION['lang'] ?? 'id';   // Pastikan mengambil bahasa dari session

$languages = [
  'id' => ['name' => 'Indonesia', 'flag' => '🇮🇩'],
  'en' => ['name' => 'English', 'flag' => '🇬🇧'],
  'ru' => ['name' => 'Русский', 'flag' => '🇷🇺'],
  'tg' => ['name' => 'Точики', 'flag' => '🇹🇯'], // Menambahkan Tajik
];
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($page_title ?? 'Rabiev Hasan Scholarship') ?></title>

  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script defer src="/hasanrabiev/js/main.js"></script>
</head>

<body>
<header>
  <nav class="navbar">
    <div class="logo">
      <a href="index.php?lang=<?= $lang ?>">Hasan Scholarship</a>
    </div>

    <ul class="nav-links">
      <li>
        <a href="index.php?lang=<?= $lang ?>" class="<?= $current_page=='index.php' ? 'active' : '' ?>">
          <?= htmlspecialchars($t['home_title'] ?? 'Beranda') ?>
        </a>
      </li>
      <li>
        <a href="tentang.php?lang=<?= $lang ?>" class="<?= $current_page=='tentang.php' ? 'active' : '' ?>">
          <?= htmlspecialchars($t['footer_about'] ?? 'Tentang Kami') ?>
        </a>
      </li>
      <li>
        <a href="apply.php?lang=<?= $lang ?>" class="<?= $current_page=='apply.php' ? 'active' : '' ?>">
          <?= htmlspecialchars($t['nav_apply'] ?? 'Cara Mendaftar') ?>
        </a>
      </li>
      <li>
    <a href="kontak.php?lang=<?= $lang ?>" class="<?= $current_page == 'kontak.php' ? 'active' : '' ?>">
        <?= htmlspecialchars($t['contact_title'] ?? 'Kontak Kami') ?>
    </a>
</li>
    </ul>

    <div class="language-dropdown" id="langDropdown">
      <button class="lang-btn">
        <?= $languages[$lang]['flag'] ?> <?= strtoupper($lang) ?> <i class="fas fa-chevron-down"></i>
      </button>
      <div class="lang-menu">
        <?php foreach ($languages as $code => $langData): ?>
          <a href="?lang=<?= $code ?>" class="<?= ($lang == $code) ? 'active' : '' ?>">
            <?= $langData['flag'] ?> <?= $langData['name'] ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </nav>
</header>
<main>
