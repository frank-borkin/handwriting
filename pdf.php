<?php
header("Content-type:application/pdf");
header("Content-Disposition:attachment;filename='handwriting.pdf'");
require 'vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

if (strcmp($_REQUEST['style'],"joined"))
{ $f="Mv Jadheedh Trace"; $n="MvJadheedhTrace-M97e";} else {$f="Learning Curve Dashed"; $n="LearningCurveDashed-w4DP";}
$html="<html><head><style>@font-face { font-family: '{$f}'; src: url('{$n}.woff')  format('woff'), url('{$n}.ttf')  format('truetype');} body, div {font-family: '{$f}'; font-size: 48pt;}</style></head><body><div>{$_REQUEST['story']}<div></body></html>";
//echo $html;

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
