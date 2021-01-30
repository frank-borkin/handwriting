<?php
header("Content-type:application/pdf");
header("Content-Disposition:attachment;filename='handwriting.pdf'");
require 'vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
if (strcmp($_REQUEST['style'],"joined"))
{ $f="Mv Jadheedh Trace"; $n="MvJadheedhTrace-M97e.ttf";} else {$f="Learning Curve Dashed"; $n="LearningCurveDashed-w4DP.ttf";}
$html="<html><head><style>@font-face { font-family: '{$f}'; src: url('{$n}')  format('truetype');} body {font-family: '{$f}';}</style></head><body>{$_REQUEST['story']}</body></html>";
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
if (!strcmp($_REQUEST['orientation'],"landscape"))
{ $o="landscape";} else {$o="portrait";}
$dompdf->setPaper('A4', $o);

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
?>
