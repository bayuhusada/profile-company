<?php
// Patch vfsStream untuk kompatibilitas PHP lama (menggantikan perintah sed yang gagal di Windows)
$file = __DIR__ . '/../vendor/mikey179/vfsstream/src/main/php/org/bovigo/vfs/vfsStream.php';
if (!is_file($file)) {
  fwrite(STDERR, "vfsStream.php not found, skipping patch.\n");
  exit(0);
}
$content = file_get_contents($file);
$patched = str_replace('name{0}', 'name[0]', $content);
if ($patched !== $content) {
  file_put_contents($file, $patched);
  echo "vfsStream patched.\n";
} else {
  echo "vfsStream already patched, nothing to do.\n";
}
exit(0);
