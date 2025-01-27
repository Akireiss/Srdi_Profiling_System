 <?php

require '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);
if (isset($_GET['submit'])) {
    $reportType = $_GET['report_type'] ;
    $region = $_GET['region'] ?? [];
    $province = $_GET['province'] ?? [];
    $municipality = $_GET['municipality'] ?? [];
    // $year = $_GET['year'];
    $date_from = $_GET['date_from'];
    $date_to = $_GET['date_to'];
    // $barangay = $_GET['barangay'];

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
            $whereConditions = [];

            if (!empty($region)) {
                $whereConditions[] = "cocoon.region = '$region'";
            }

            if (!empty($province)) {
                $whereConditions[] = "cocoon.province = '$province'";
            }

            if (!empty($municipality)) {
                $whereConditions[] = "cocoon.municipality = '$municipality'";
            }

            if (!empty($city)) {
                $whereConditions[] = "cocoon.municipality = '$city'";
            }

            // if (!empty($year)) {
            //     // Extract the year from the date_validation column
            //     $whereConditions[] = "YEAR(cocoon.date_validation) = '$year'";
            // }

            // Add date range filtering conditions
            if (!empty($date_from)) {
                $whereConditions[] = "cocoon.date_validation >= '$date_from'";
            }

            if (!empty($date_to)) {
                $whereConditions[] = "cocoon.date_validation <= '$date_to'";
            }

            $query = "
                SELECT * FROM cocoon
                LEFT JOIN education ON cocoon.education = education.education_id
                LEFT JOIN civil ON cocoon.civil_status = civil.civil_id
                LEFT JOIN region ON cocoon.region = region.regCode
                LEFT JOIN province ON cocoon.province = province.provCode
                LEFT JOIN municipality ON cocoon.municipality = municipality.citymunCode
                LEFT JOIN barangay ON cocoon.barangay = barangay.brgyCode
                LEFT JOIN religion ON cocoon.religion = religion.religion_id
             ";

            if (!empty($whereConditions)) {
                $query .= " WHERE " . implode(" AND ", $whereConditions);
            }

            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                $reportData[] = $row;
            }
            break;



            case 'REP02':
                $whereConditions = [];
            
                if (!empty($region)) {
                    $whereConditions[] = "site.region = '$region'";
                }
            
                if (!empty($province)) {
                    $whereConditions[] = "site.province = '$province'";
                }
            
                // Only add condition for city if it's not empty
                if (!empty($city)) {
                    $whereConditions[] = "site.municipality = '$city'";
                }
            
                $query = "SELECT * FROM site
                          LEFT JOIN cocoon ON cocoon.cocoon_id = site.producer_id";
            
                // Only add WHERE clause if there are conditions
                if (!empty($whereConditions)) {
                    $query .= " WHERE " . implode(" AND ", $whereConditions);
                }
            
                $result = $conn->query($query);
            
                while ($row = $result->fetch_assoc()) {
                    $reportData[] = $row;
                }
                break;
            


        case 'REP03':

            $result = $conn->query(
                'SELECT * FROM production
            LEFT JOIN cocoon
            ON cocoon.cocoon_id = production.producer_id
            LEFT JOIN site
            ON cocoon.cocoon_id = site.producer_id
            ORDER BY cocoon.name ASC'
            );
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
