
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
                        echo 'LIST OF PROJECT IN-CHARGE';
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
                        echo '<td class="center padding">Age</td>';
                        echo '<td class="center padding">Birthdate</td>';
                        echo '<td class="center padding">Gender</td>';
                        echo '<td class="center padding">Type</td>';
                        echo '<td class="center padding">Educational Attainment</td>';
                        echo '<td class="center padding">Religion</td>';
                        break;

                    case 'REP02':
                        echo '<td class="center padding">Producer</td>';
                        echo '<td class="center padding">Location</td>';
                        echo '<td class="center padding">Topography</td>';
                        echo '<td class="center padding">Land</td>';
                        break;

                    case 'REP03':
                        //Continue hereee --joshua
                        //kbail mo toy

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
                            echo '<td class="center padding">' . htmlspecialchars($row['age']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['birthdate']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['sex']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['type']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['education_name']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['religion_name']) . '</td>';
                            break;

                        case 'REP02':
                            echo '<td class="center padding">' . htmlspecialchars($row['name']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['location']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['topography']) . '</td>';
                            echo '<td class="center padding">' . htmlspecialchars($row['land']) . '</td>';
                       
                            break;

                        case 'REP03':
                        //Continue hereee --joshua

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

