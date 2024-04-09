<?php
session_start();
include '../db_con.php';
$db = new db();

error_reporting(E_ALL);
ini_set('display_errors', 1);


if(!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


<?php
             $result = $db->getSiteID($_GET['site_id']);
while($row = mysqli_fetch_object($result)) {

    //Site Table
    $location             = $row->location;
    $topography           = $row->topography;
    $topographyName       = $row->topography_name;
    $address              = $row->address;
    $distance             = $row->distance;
    $land_area            = $row->land_area;
    $area                 = $row->area;
    $crops                 = $row->crops;
    $share                 = $row->share;
    $water                 = $row->water;

    $names                = $row->names;
    $position             = $row->position;
    $date                 = $row->date;



    $name1                = $row->name1;
    $position1             = $row->position1;
    $date1                 = $row->date1;

    $name2                = $row->name2;
    $position2             = $row->position2;
    $date2                 = $row->date2;


    $birthdate            = $row->birthdate;

    //Production Table
    $production_date      = $row->production_date;
    $total_production     = $row->total_production;


    // Cocoon 
    $p_income    = $row->p_income;
    $p_cost     = $row->p_cost;
    $n_income     = $row->n_income;
    $irrigation  = $row->irrigation;
    $market  = $row->market;
    $cocoonId = $row->cocoon_id;


}
?>


    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Pdf</title>


        <style type="text/css">
            * {
                font-family:'Times New Roman', Times, serif;
            }

            .page-break {
                page-break-after: always;
            }

            table {
                font-size: x-small;
                border-collapse: collapse;

            }

            table td {
                padding: 5px;
                font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                font-size: 16px;
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
                font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif

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
            .line{
                border-bottom: 1px solid black;
            }
            /* .mb{
                margin-bottom: 70px;
            } */
        .underline {
        text-decoration: underline;
    }
</style>

        </style>
    </head>

    <body>
        <br>
        
        
        <table width="100%" style="margin-top: 10px">
            <tbody>
                <tr>
        
                    <td class="bold">
          B. Site Inspection
                </td>
    
                </tr>
            </tbody>
        </table>


        <table width="100%">
            <tbody>
                <tr>
                    <td width="5%"></td>
                    <td width="80%">Farm Location/Address:<span class="underline"> <?php echo $location;?> </span></td>
                </tr>
                <
            </tbody>
            <tbody>
            <tr>
                    <td width="5%"></td>
                    <td width="80%">Topography:<span class="underline"> <?php echo $topographyName;?> </span></td>
                </tr>
            </tbody>
            <tbody>
            <tr>
                    <td width="5%"></td>
                    <td width="80%">House no./Street:<span class="underline"> <?php echo $address;?> </span></td>
                </tr>
            </tbody>
        </table>
        <table width="100%">
            <tbody>
                <tr>
                  <td >Distance from the main/barangay road: <span class="underline"> <?php echo $distance;?> </span>meters.</td>  
                </tr>
            </tbody>
        </table>

        <table width="100%">
            <tbody>
                <tr>
                  <td >Available land area for planting mulberry: <span class="underline"> <?php echo $land_area;?> </span>hectares.</td>  
                </tr>
            </tbody>
        </table>
        <table width="100%">
                    <td class="bold" width="30%">Area(Hectares):<span class="underline"> <?php echo $area;?> </span></td>
                    <td class="bold" width="30%">Crops Grovwn:<span class="underline"> <?php echo $crops;?> </span></td>
                    <td class="bold" width="20%">%Share:<span class="underline"> <?php echo $share;?></td>
        </table>


        <table width="100%" style="margin: 15px 0px">
            <tbody>
                <tr>
                    <td class="bold">
                        Land Types
                    </td>
                </tr>
            </tbody>
        </table>
        
        <?php
            $result = $db->getSelectedLandPdf($_GET['site_id']);
            $selectedSources = array(); // Array to store selected sources
            while ($row = mysqli_fetch_array($result)) {
                $selectedSources[] = $row['land_id']; // Store source_id in the array
            }
            ?>
            <?php
            $result = $db->getLands();
            $count = 0;
            echo '<table width="80%"><tbody><tr>';
            while ($row = mysqli_fetch_array($result)) {
                if ($count % 2 == 0 && $count != 0) {
                    echo '</tr><tr>';
                }
        ?>

<td width="100%" style="vertical-align: top;">
    <div style="display: inline-block;">
        <div class="<?php echo in_array($row['land_id'], $selectedSources) ? 'check' : 'checkbox'; ?>" style="display: inline-block;">
            <input type="checkbox" name="source_<?php echo $row['land_id']; ?>" <?php echo in_array($row['land_id'], $selectedSources) ? 'checked' : ''; ?>>
        </div>
        <?php if (!empty($row['land_name'])): ?>
            <label for="source_<?php echo $row['land_id']; ?>" style="display: inline-block;"><?php echo $row['land_name']; ?></label>
        <?php endif; ?>
    </div>
</td>



<?php
    $count++;
}

// Close the last row and table
echo '</tr></tbody></table>';
?>




<table width="100%" style="margin: 15px 0px">
            <tbody>
                <tr>
                    <td class="bold">
                        Tenency Status
                    </td>
                </tr>
            </tbody>
        </table>
        
        <?php
            $result = $db->getSelectedTenancy($_GET['site_id']);
            $selectedSources = array(); // Array to store selected sources
            while ($row = mysqli_fetch_array($result)) {
                $selectedSources[] = $row['tenancy_id']; // Store source_id in the array
            }
            ?>
            <?php
            $result = $db->getTenancyPdf();
            $count = 0;
            echo '<table width="80%"><tbody><tr>';
            while ($row = mysqli_fetch_array($result)) {
                if ($count % 2 == 0 && $count != 0) {
                    echo '</tr><tr>';
                }
        ?>

<td width="100%" style="vertical-align: top;">
    <div style="display: inline-block;">
        <div class="<?php echo in_array($row['tenancy_id'], $selectedSources) ? 'check' : 'checkbox'; ?>" style="display: inline-block;">
            <input type="checkbox" name="source_<?php echo $row['tenancy_id']; ?>" <?php echo in_array($row['tenancy_id'], $selectedSources) ? 'checked' : ''; ?>>
        </div>
        <?php if (!empty($row['tenancy_name'])): ?>
            <label for="source_<?php echo $row['tenancy_id']; ?>" style="display: inline-block;"><?php echo $row['tenancy_name']; ?></label>
        <?php endif; ?>
    </div>
</td>



<?php
    $count++;
}

// Close the last row and table
echo '</tr></tbody></table>';
?>












        <table width="100%">
            <tbody>
                <tr>
                    <td>Availability of reliable irrigation:</td>
                    <td>
                        <div class="<?php echo ($irrigation == 'Available') ? 'check' : 'checkbox'; ?>"></div>
                        <label class="label">Available</label>
                    </td>
                    <td>
                        <div class="<?php echo ($irrigation == 'Not Available') ? 'check' : 'checkbox'; ?>"></div>
                        <label class="label">Not Available</label>
                    </td>
                </tr>
            </tbody>
        </table>

        <table width="100%">
            <tbody>
                <tr>
                    <td>Water Source:</td>
                    <td>
                        <div class="<?php echo ($water == 'Irrigated') ? 'check' : 'checkbox'; ?>"></div>
                        <label class="label">Irrigated</label>
                    </td>
                    <td>
                        <div class="<?php echo ($water == 'Rainfed') ? 'check' : 'checkbox'; ?>"></div>
                        <label class="label">Rainfed</label>
                    </td>
                </tr>
            </tbody>
        </table>

<!-- Test hererere -->




<table width="100%" style="margin: 15px 0px">

            <tbody>
                <tr>
                    <td class="bold">
                        Soil Type
                    </td>
                </tr>
            </tbody>
        </table>

        
        <?php
            $result = $db->getSelectedSiteSoil($_GET['site_id']);
            $selectedSources = array(); // Array to store selected sources
            while ($row = mysqli_fetch_array($result)) {
                $selectedSources[] = $row['soil_id']; // Store source_id in the array
            }
            ?>
            <?php
            $result = $db->getSoils();
            $count = 0;
            echo '<table width="80%"><tbody><tr>';
            while ($row = mysqli_fetch_array($result)) {
                if ($count % 2 == 0 && $count != 0) {
                    echo '</tr><tr>';
                }
        ?>

<td width="100%" style="vertical-align: top;">
    <div style="display: inline-block;">
        <div class="<?php echo in_array($row['soil_id'], $selectedSources) ? 'check' : 'checkbox'; ?>" style="display: inline-block;">
            <input type="checkbox" name="source_<?php echo $row['soil_id']; ?>" <?php echo in_array($row['soil_id'], $selectedSources) ? 'checked' : ''; ?>>
        </div>
        <?php if (!empty($row['soil_name'])): ?>
            <label for="source_<?php echo $row['soil_id']; ?>" style="display: inline-block;"><?php echo $row['soil_name']; ?></label>
        <?php endif; ?>
    </div>
</td>







    <?php
    $count++;
}

// Close the last row and table
echo '</tr></tbody></table>';
?>








































<table width="100%">
    <tbody>
        <tr>
            <td>Accessibility to farm to market road:</td>
            <td>
                <div class="<?php echo ($market == 'Accessible') ? 'check' : 'checkbox'; ?>"></div>
                <label class="label">Accessible</label>
            </td>
            <td>
                <div class="<?php echo ($market == 'Not Accessible') ? 'check' : 'checkbox'; ?>"></div>
                <label class="label">Not Accessible</label>
            </td>
        </tr>
    </tbody>
</table>


       
<br>
<br>
        <table width="100%">
            <tbody>
                <tr>
                    <td width="60%"></td>
                  <td >Signature of Framer Cooperator:</td>  
                </tr>
            </tbody>
            </table>

            <table class="bold" width="100%">
            <tbody>
                <tr>
                  <td >Remarks:</td>  
                </tr>
            </tbody>
        </table>

        <table width="100%">
            <tbody>
                <tr>
                  <td >Herewith the Monitoring and Evaluation Team, declares to have visited the proposed location for mulberry plantation 
                field and found the site reasonably suited for mulberry leaf production and silkworm rearing/cocoon production</td>  
                </tr>
            </tbody>
        </table>
<br>
<table width="100%">
    <tbody>
        <tr>
        <td width="25%">Name <div style="border-bottom: 1px solid black; width: 80%;"><?php echo !empty($names) ? $names : "____________________"; ?></div></td>


<td width="25%">Position <div  style="border-bottom: 1px solid black; width: 80%;" class="underline"><?php echo !empty($positions) ? $positions : "___________"; ?></div></td>

    <td>Signature <div class="underline">___________</div></td>  
    <td width="20%">Date <div  style="border-bottom: 1px solid black; width: 80%;" class="underline"><?php echo !empty($date) ? $date : "___________"; ?></div></td>
        </tr>
    </tbody>
</table>

<table width="100%">
    <tbody>
    <tr>
        <td width="25%">Name <div  style="border-bottom: 1px solid black; width: 80%;" class="underline"><?php echo !empty($name1) ? $name1 : "___________"; ?></div></td>

        <td width="25%">Position <div  style="border-bottom: 1px solid black; width: 80%;" class="underline"><?php echo !empty($position1) ? $position1 : "___________"; ?></div></td>

            <td>Signature <div class="underline">___________</div></td>  
            <td width="20%">Date <div  style="border-bottom: 1px solid black; width: 80%;" class="underline"><?php echo !empty($date1) ? $date1 : "___________"; ?></div></td>

        </tr>
    </tbody>
</table>

<table width="100%">
    <tbody>
        <tr>
        <td width="25%">Name <div  style="border-bottom: 1px solid black; width: 80%;" class="underline"><?php echo !empty($name2) ? $name2 : "___________"; ?></div></td>

        <td width="25%">Position <div  style="border-bottom: 1px solid black; width: 80%;" class="underline"><?php echo !empty($position2) ? $position2 : "___________"; ?></div></td>

            <td>Signature <div class="underline">___________</div></td>  
            <td width="20%">Date <div  style="border-bottom: 1px solid black; width: 80%;" class="underline"><?php echo !empty($date2) ? $date2 : "___________"; ?></div></td>

        </tr>
    </tbody>
</table>

        
        <table width="100%">
            <tbody>
                <tr>

    <br>     
    <br>       
    <br> 
    <br> 
    <br> 
    <td class="bold">
          C. Production
                </td>
    
                </tr>
            </tbody>
        </table>




        <!-- Loop the production here -->


        <table width="100%">
            <tbody>
                <tr>
                    <td width ="15%">Production Date: </td>
                    <td width ="15%">Total Production: </td>
                    <td width ="15%">Gross Income:   </td>
                    <td width ="15%">Production Cost: </td>
                    <td width ="10%">Net Income: </td>
                </tr>
            </tbody>
            <tbody>

                <?php
            $result = $db->getCocoonProducer($cocoonId);
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<td>' . date('F d, Y', strtotime($row['production_date'])) . '</td>';

                echo '<td>' . $row['total_production'] . '</a></td>';
                echo '<td>' . number_format($row['p_income'], 2) . '</td>';
                echo '<td>' . number_format($row['p_cost'], 2) . '</td>';
                echo '<td>' . number_format($row['n_income'], 2) . '</td>';
                
                echo '</tr>';
            }
?> 
            </tbody>
        </table>

       



    </body>

    </html>
