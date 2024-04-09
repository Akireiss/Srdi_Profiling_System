<?php
session_start();
include '../db_con.php';
$db = new db();
?>
<!doctype html>
    <html lang="en">
    <title><?= $reportType ?> - PDF Report</title>
    <head>
        <meta charset="UTF-8">
        <title>Pdf</title>


        <style type="text/css">
            * {
                font-family: Verdana, Arial, sans-serif;
            }

            .page-break {
                page-break-after: always;
            }

            table {
                font-size: x-small;
                border-collapse: collapse;

            }

            table td {
                border: 1px solid black; 
            }

            table th {
                /* border: 1px solid black; */

            }
            .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            padding: 10px;
            font-size: small;
        }

            .gray {
                background-color: lightgray
            }

            .bold {
                font-weight: bold;
            }

            .checkbox {
                width: 12px;
                height: 12px;
                border: 1px solid #000;
                /* background-color: #000; */
                display: inline-block;
                /* Display the checkbox inline */
                margin-right: 4px;
                /* Add some spacing between checkbox and label */
            }

            .check {
                width: 12px;
                height: 12px;
                border: 1px solid #000;
                background-color: #000;
                display: inline-block;
                /* Display the checkbox inline */
                margin-right: 4px;
                /* Add some spacing between checkbox and label */
            }

            .label {
                display: inline-block;
            }

            .center {
                text-align: center;
                /* Center align the content within all <td> elements */
            }

            .underline {
                text-decoration: underline;
            }
            .margin{
                margin: 4px;
            }
            .main{
                padding: 20px 15px;
            }
            .padding{
                padding: 6px;
            }
            
        </style>
    </head>

    <body>
    <!doctype html>
<html lang="en">
<head>
<div class="main">

        <br>

        <!-- Main function, loop through the data -->
        <table width="100%">
            <tbody>
                <tr>
                    <!-- ... Your existing table headers ... -->
                </tr>

                <?php
                // Initialize page number
                $pageNumber = 1;

foreach ($reportData as $row) {
    // ... Your existing code to generate rows ...

    // Check if a page break is needed
    if ($pageNumber % 20 == 0) {
        echo '</table><div class="page-break"></div><table width="100%"><tbody><tr><!-- ... Your existing table headers ... --></tr>';
    }

    // Increment page number for the next iteration
    $pageNumber++;
}
?>
            </tbody>
        </table>

        <!-- Footer -->
        <div class="footer">
            Page <?php echo $pageNumber; ?>
        </div>
    </div>

</head>

<body>
    <!-- Your existing content -->

    <!-- Footer -->
    <div class="footer">
        Page <?php echo $pageNumber; ?>
    </div>
</body>
</html>


    <table width="100%">
        <tbody>
            <td class="center main bold">
                <?php
// Display the title based on the selected report type
switch ($reportType) {
    case 'REP01':
        echo 'LIST OF COCOON PRODUCERS';
        break;

    case 'REP02':
        echo 'LIST OF PROJECT SITES';
        break;

    case 'REP03':
        echo 'LIST OF PRODUCTION';
        break;

    default:
        echo 'UNKNOWN REPORT TYPE';
        break;
}
?>
            </td>
        </tbody>
    </table>
    <br>

    <!-- Main function, loop through the data -->
    <table width="100%">
        <tbody>
            <tr>
                <?php
// Display table headers based on the selected report type
switch ($reportType) {
    case 'REP01':
        echo '<td class="center padding">Name</td>';
        echo '<td class="center padding">Complete Address</td>';
        echo '<td class="center padding">Civil Status</td>';
        echo '<td class="center padding">Name of Spouse</td>';
        echo '<td class="center padding">Age</td>';
        echo '<td class="center padding">Birthdate</td>';
        echo '<td class="center padding">Gender</td>';
        echo '<td class="center padding">Type</td>';
        echo '<td class="center padding">Educational Attainment</td>';
        echo '<td class="center padding">Religion</td>';
        break;

    case 'REP02':
        echo '<td class="center padding">Funding Agency</td>';
        echo '<td class="center padding">Project Site Location</td>';
        echo '<td class="center padding">Farmer Cooperator</td>';
        echo '<td class="center padding">Date Started</td>';
        echo '<td class="center padding">Project In-Charge</td>';

        break;

    case 'REP03':
        echo '<td class="center padding">Farmers Cooperator</td>';
        echo '<td class="center padding">Project Site Location</td>';
        echo '<td class="center padding">Production Date</td>';
        echo '<td class="center padding">Total Production</td>';


        break;

    default:
        die("Unknown report type");
        break;
}
?>
            </tr>

                <?php foreach ($reportData as $row) : ?>
                    <tr>
                        <?php
        //Same Concept again
        switch ($reportType) {
            
            case 'REP01':
                echo '<td class="center padding">' . htmlspecialchars($row['name']) . '</td>';
                echo '<td class="center padding">' . htmlspecialchars($row['brgyDesc'] . ', ' . $row['citymunDesc']) . ', ' . $row['provDesc'] . ', ' . $row['regDesc'] . '</td>';
                echo '<td class="center padding">' . ($row['civil_name'] ?? "No Data") . '</td>';
                echo '<td class="center padding">' . ($row['name_spouse'] ?? "No Data") . '</td>';
                echo '<td class="center padding">' . htmlspecialchars($row['age'] ?? "No Data") . '</td>';
                echo '<td class="center padding">' . htmlspecialchars($row['birthdate'] ?? "No Data") . '</td>';
                echo '<td class="center padding">' . htmlspecialchars($row['sex'] ?? "No Data") . '</td>';
                echo '<td class="center padding">' . htmlspecialchars($row['type'] ?? "No Data") . '</td>';
                echo '<td class="center padding">' . htmlspecialchars($row['education_name'] ?? "No Data") . '</td>';
                echo '<td class="center padding">' . htmlspecialchars($row['religion_name'] ?? "No Data") . '</td>';
                break;



                case 'REP02':
                    // $siteAgencyResult = $db->getSiteAgency($row['site_id']);

                    
                    // // Display data from site_agency table
                    // if ($siteAgencyResult && mysqli_num_rows($siteAgencyResult) > 0) {
                    //     while ($siteAgencyRow = mysqli_fetch_assoc($siteAgencyResult)) {
                    //         echo '<td class="center padding">' . htmlspecialchars($siteAgencyRow['agency_id']) . '</td>';
                    //     }
                    // } else {
                    //     echo '<td class="center padding" colspan="2">No Data</td>';
                    // }
                    
                
                    // Display data from site table
                    echo '<td class="center padding">' . htmlspecialchars($row['site_id'] ?? "No Data") . '</td>';
                    echo '<td class="center padding">' . htmlspecialchars($row['location'] ?? "No Data") . '</td>';
                    echo '<td class="center padding">' . htmlspecialchars($row['name'] ?? "No Data") . '</td>';
                    echo '<td class="center padding">' . htmlspecialchars($row['date_validation'] ?? "No Data") . '</td>';
                    echo '<td class="center padding">' . htmlspecialchars($row['charge'] ?? "No Data") . '</td>';
                    
                    break;
                
                


            case 'REP03':
                echo '<td class="center padding">' . htmlspecialchars($row['name'] ?? "No Data") . '</td>';
                echo '<td class="center padding">' . htmlspecialchars($row['location'] ?? "No Data") . '</td>';
                echo '<td class="center padding">' . htmlspecialchars($row['production_date'] ?? "No Data") . '</td>';
                echo '<td class="center padding">' . htmlspecialchars($row['total_production'] ?? "No Data") . '</td>';
                break;


            default:
                // Handle unknown report type
                die("Unknown report type");
                break;
        }
                    ?>
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</body>

