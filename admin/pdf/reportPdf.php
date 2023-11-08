
<!doctype html>
    <html lang="en">

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

        <table width="100%">
            <tbody>
                <td class="center main bold">LIST OF COCOON PRODUCERS </td>
            </tbody>
        </table>
<br>
<!-- Main function all you need is loop --Aki -->
     <php?


$reportData = fetchReportData($reportType, $db);

if ($reportType === 'REP01') {
    echo '<table width="100%">';
    echo '<tbody>';
    echo '<tr>';
    echo '<td class="center padding">Name</td>';
    echo '<td class="center padding">Complete Address</td>';
    echo '</tr>';
    foreach ($reportData as $row) {
        echo '<tr>';
        echo '<td class="center padding">' . $row['name'] . '</td>';
        echo '<td class="center padding">' . $row['complete_address'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}
     ?>