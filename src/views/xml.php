<?= '<'.'?'.'xml version="1.0" encoding="UTF-8"?>'."\n" ?>
<?php if ($style != null) echo '<'.'?'.'xml-stylesheet href="'.$style.'" type="text/xsl"?>'."\n"; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
<?php foreach($items as $item) : ?>
  <url>
    <loc><?= $item['loc'] ?></loc>
<?php

if (!empty($item['translations'])) {
  foreach ($item['translations'] as $translation) {
    echo "\t\t" . '<xhtml:link rel="alternate" hreflang="' . $translation['language'] . '" href="' . $translation['url'] . '" />' . "\n";
  }
}

if (!empty($item['alternates'])) {
  foreach ($item['alternates'] as $alternate) {
    echo "\t\t" . '<xhtml:link rel="alternate" media="' . $alternate['media'] . '" href="' . $alternate['url'] . '" />' . "\n";
  }
}

if ($item['priority'] !== null) {
  echo "\t\t" . '<priority>' . $item['priority'] . '</priority>' . "\n";
}

if ($item['lastmod'] !== null) {
  echo "\t\t" . '<lastmod>' . date('Y-m-d\TH:i:sP', strtotime($item['lastmod'])) . '</lastmod>' . "\n";
}

if ($item['freq'] !== null) {
  echo "\t\t" . '<changefreq>' . $item['freq'] . '</changefreq>' . "\n";
}

if (!empty($item['images'])) {
  foreach($item['images'] as $image) {
    echo "\t\t" . '<image:image>' . "\n";
    echo "\t\t\t" . '<image:loc>' . $image['url'] . '</image:loc>' . "\n";
    if (isset($image['title'])) echo "\t\t\t" . '<image:title>' . $image['title'] . '</image:title>' . "\n";
    if (isset($image['caption'])) echo "\t\t\t" . '<image:caption>' . $image['caption'] . '</image:caption>' . "\n";
    if (isset($image['geo_location'])) echo "\t\t\t" . '<image:geo_location>' . $image['geo_location'] . '</image:geo_location>' . "\n";
    if (isset($image['license'])) echo "\t\t\t" . '<image:license>' . $image['license'] . '</image:license>' . "\n";
    echo "\t\t" . '</image:image>' . "\n";
  }
}

?>
  </url>
<?php endforeach; ?>
</urlset>

