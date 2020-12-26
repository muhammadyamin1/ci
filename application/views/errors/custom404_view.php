<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<html>
<head>
    <title>Oops... Halaman Tidak Ditemukan</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dist/css/custom404.css" />
</head>
<body>
<div class="noise"></div>
<div class="overlay"></div>
<div class="terminal">
  <h1>Error <span class="errorcode">404</span></h1>
  <p class="output">Oops... Halaman yang anda cari tidak dapat ditemukan.</p>
  <p class="output">Halaman mungkin telah dihapus atau dirubah.</p>
  <p class="output">Anda bisa kembali ke halaman utama melalui link berikut : <br><a href="<?php echo base_url(); ?>">Kembali ke halaman utama</a>.</p>
  <p class="output">Good luck.</p>
  <p class="output">Pay SPP V1.0 by Muhammad Yamin.</p>
  <p class="output">Powered By Codeigniter 3.</p>
</div>
</body>
</html>