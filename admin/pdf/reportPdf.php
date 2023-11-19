
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


    <h1><?= $reportType ?> - PDF Report</h1>

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
                        echo '<td class="center padding">Status</td>';
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
                            echo '<td class="center padding">' . htmlspecialchars($row['brgyDesc']. ', ' .$row['citymunDesc']) . ', ' . $row['provDesc'] . ', ' . $row['regDesc'] . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['civil_status']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['name_spouse']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['age']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['birthdate']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['sex']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['type']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['education_name']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['religion_name']) . '</td>';
                            break;

                        case 'REP02':
                            echo '<td class="center padding">' . htmlspecialchars($row['agency']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['location']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['name']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['date_validation']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['charge']) . '</td>';
                       
                            break;

                        case 'REP03':
                            echo '<td class="center padding">' . htmlspecialchars($row['name']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['production_date']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['total_production']) . '</td>';

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

