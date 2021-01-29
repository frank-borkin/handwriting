<?php
header("Content-type:application/pdf");
header("Content-Disposition:attachment;filename='handwriting.pdf'");
require 'vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($_REQUEST['story']);

// (Optional) Setup the paper size and orientation
if !strcmp($_REQUEST['landscape'],"landscape")
{ $o="landscape";} else {$o="portrait;"}
$dompdf->setPaper('A4', $o);

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
?>
