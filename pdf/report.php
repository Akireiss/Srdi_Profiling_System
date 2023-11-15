<?php

require '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);
if (isset($_GET['submit'])) {
    $reportType = $_GET['report_type'];

    $reportData = [];

    // temporary db//--aki//
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'profiling_system';

    $conn = new mysqli($host, $username, $password, $database);

  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    switch ($reportType) {
        case 'REP01':
    
            $result = $conn->query('SELECT * FROM cocoon
            LEFT JOIN education
            ON cocoon.education = education.education_id
            LEFT JOIN region
                ON cocoon.region = region.regCode
                LEFT JOIN province
                ON cocoon.province = province.provCode
                LEFT JOIN municipality
                ON cocoon.municipality = municipality.citymunCode
                LEFT JOIN barangay
                ON cocoon.barangay = barangay.brgyCode
                LEFT JOIN religion
                ON cocoon.religion = religion.religion_id');
            while ($row = $result->fetch_assoc()) {
                $reportData[] = $row;
            }
            break;

        case 'REP02':
           
            $result = $conn->query('SELECT * FROM site');
            while ($row = $result->fetch_assoc()) {
                $reportData[] = $row;
            }
            break;

        case 'REP03':
          
            $result = $conn->query('SELECT * FROM project_incharge');
            while ($row = $result->fetch_assoc()) {
                $reportData[] = $row;
            }
            break;

        default:
     
            die("Unknown report type");
    }


    $conn->close();


    ob_start();

    include '../admin/pdf/reportPdf.php'; //

    $html = ob_get_clean();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'landscape');

    $dompdf->render();

    $dompdf->stream('document.pdf', ['Attachment' => false]);
} else {
   
    die("Form not submitted");
}