<?php

require '../vendor/autoload.php';


use Dompdf\Dompdf;
use Dompdf\Options;

// Initialize Dompdf with some options
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);

// Start output buffering
ob_start();

// Include the PHP file (e.g., "example.php")
include 'pdf.php';

// Get the output of the included PHP file as HTML
$html = ob_get_clean();

// Load the HTML content into DOMPDF
$dompdf->loadHtml($html);

// Set paper size and orientation (e.g., 'A4', 'portrait')
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the PDF (inline or download)
$dompdf->stream('document.pdf', ['Attachment' => false]);
