<?php
  header('Content-Type: application/download');
  header('Content-Disposition: attachment; filename="Fiche_de_paie.pdf"');
  header("Content-Length: " . filesize("Fiche_de_paie.pdf"));
?>
Fiche de paie
<?php
//   $fp = fopen("Sample.pdf", "r");
//   fpassthru($fp);
//   fclose($fp);
?>