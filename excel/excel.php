<?php

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_GET['submit'])) {
    // Process form data
    $reportType = $_GET['report_type'] ?? '';
    $region = $_GET['region'] ?? [];
    $province = $_GET['province'] ?? [];
    $municipality = $_GET['municipality'] ?? [];
    $date_from = $_GET['date_from'] ?? '';
    $date_to = $_GET['date_to'] ?? '';

    $reportData = [];

    // Temporary database connection
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


    if ($result->num_rows > 0) {
        // Create a new PhpSpreadsheet instance
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        switch ($reportType) {
            case 'REP01':
                $headers = ['Name', 'Complete Address', 'Civil Status', 'Name of Spouse', 'Age', 'Birthdate
                ', 'Gender', 'Type', 'Educational Attainment', 'Religion']; // Modify with your actual headers for REP01
                break;
            case 'REP02':
                $headers = ['Funding Agency', 'Project Site Location', 'Farmer Cooperator', 'Date Started', 'Projectnn In Charge']; // Modify with your actual headers for REP02
                break;
            case 'REP03':
                $headers = ['Farmers Cooperator', 'Project Site Location', 'Production Date', 'Total Production']; // Modify with your actual headers for REP03
                break;
        }
        $sheet->fromArray($headers, NULL, 'A1');

        // Populate data rows
        $startRow = 2;
        while ($row = $result->fetch_assoc()) {
            $rowData = []; // Populate this array with data for each row based on your query result
            $sheet->fromArray($rowData, NULL, 'A' . $startRow);
            $startRow++;
        }

        // Save Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = 'report.xlsx';
        $writer->save($filename);

        // Download the file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }  else {
    die("Form not submitted");
}
}
