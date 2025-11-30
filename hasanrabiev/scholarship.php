<?php
$page_title = "Detail Beasiswa";
include __DIR__.'/inc/header.php';

$id = $_GET['id'] ?? '';
$scholarships = json_decode(file_get_contents(__DIR__.'/data/scholarships.json'), true);
$detail = null;
foreach($scholarships as $s) if($s['id'] === $id) { $detail = $s; break; }

if (!$detail) {
  echo "<h2>Beasiswa tidak ditemukan</h2><p>Kembali ke <a href='/agen-beasiswa/scholarships.php'>daftar beasiswa</a>.</p>";
  include __DIR__.'/inc/footer.php';
  exit;
}
?>
<article class="scholarship-detail">
  <h2><?=htmlspecialchars($detail['title'])?></h2>
  <p><strong>Kategori:</strong> <?=htmlspecialchars($detail['category'])?> | <strong>Lokasi:</strong> <?=htmlspecialchars($detail['location'])?> | <strong>Jenis:</strong> <?=htmlspecialchars($detail['type'])?></p>
  <p><strong>Deadline:</strong> <?=htmlspecialchars($detail['deadline'])?></p>

  <h3>Deskripsi</h3>
  <p><?=nl2br(htmlspecialchars($detail['description']))?></p>

  <h3>Eligibility</h3>
  <ul>
    <?php foreach($detail['eligibility'] as $e): ?>
      <li><?=htmlspecialchars($e)?></li>
    <?php endforeach; ?>
  </ul>

  <a class="btn" href="/agen-beasiswa/apply.php?scholarship=<?=urlencode($detail['id'])?>">Daftar Sekarang</a>
</article>

<?php include __DIR__.'/inc/footer.php'; ?>