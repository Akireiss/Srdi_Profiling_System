<?php
  session_start();
  include '../db_con.php';
  $db = new db;
  if(!isset($_SESSION['user_id'])){
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
             $result=$db->getProducerID($_GET['cocoon_id']);
            while($row=mysqli_fetch_object($result)){
                $cocoonID             = $row->cocoon_id;
                $date_validation      = $row->date_validation ;
                $name                 = $row->name;
                $status                = $row->status;
                $age                  = $row->age;
                $birthdate            = $row->birthdate;
                $type                 = $row->type;
                $sex                  = $row->sex;
                $region 	          = $row->region;
                $regName              =$row->regDesc;
                $province             = $row->province;
                $provName             = $row->provDesc;
                $municipality         = $row->municipality;
                $citymunName          = $row->citymunDesc;
                $barangay             = $row->barangay;
                $barangayName         = $row->brgyDesc;
                $address              = $row->address;
                $education            = $row->education;
                $educationName        = $row->education_name;
                $religion             = $row->religion;
                $religionName         = $row->religion_name;
                $civil_status         = $row->civil_status;
                $civilName            = $row->civil_name;
                $name_spouse          = $row->name_spouse;
                $farm_participate     = $row->farm_participate;
                $cannot_participate   = $row->cannot_participate;
                $male                 = $row->male;
                $female               = $row->female;
                $source_income        = $row->source_income;
                $years_in_farming     = $row->years_in_farming;
                $available_workers    = $row->available_workers;
                $farm_tool            = $row->farm_tool;
                $intent               = $row->intent;
                $signature            = $row->signature;
                $id_pic               = $row->id_pic;
                $intent               = $row->intent;
                $signature            = $row->signature;
                $bypic                = $row->bypic;
            //Site Table
                $location             = $row->location; 
                $distance             = $row->distance; 
                $land_area            = $row->land_area;
                $area                 = $row->area;
                $names                = $row->names;
                $position             = $row->position;
                $date                 = $row->date;
                $birthdate            = $row->birthdate;
            //Production Table
                $production_date      = $row->production_date;
                $total_production     = $row->total_production;
                $p_income    = $row->p_income;
                $p_cost     = $row->p_cost;
                $n_income     = $row->n_income;
            

    
            }
        ?>


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
        </style>
    </head>

    <body>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        
        
        <table width="100%" style="margin-bottom: 5px">
            <tbody>
                <tr>

                    <td>Date of Validation: <span class="underline"> <?php echo $date_validation?> </span></td>
                </tr>
                <tr>

                    <td class="bold margin mb">A. Personal Information:</td>
                    
                </tr>
            </tbody>
        </table>

        <table>
            <tbody>
                <tr>
                    <td width="15%">Name: <span class="underline"> <?php echo $name?> </span></td>
                    <td width="15%">Birthdate: <span class="underline"> <?php echo $birthdate?> </span></td>
                    <td width="15%">Age:<span class="underline"> <?php echo $age?> </span></td>
                    <td width="15%">Sex: <span class="underline"> <?php echo $sex?> </span></td>
                </tr>
                </table>

                <table>
                <tr>
                    <td width="80%">Permanent Address: <span class="underline"> <?php echo $barangayName?>, <?php echo $citymunName?>, <?php echo $provName ?></span></td>
                </tr>
            </tbody>
        </table>

        <table width="100%">
            <tbody>
                <tr>
                    <td width="5%"></td>
                    <td width="50%">Educational Attainment:<span class="underline"> <?php echo $educationName?> </span></td>
                    <td width="25%">Religion: <span class="underline"> <?php echo $religionName?> </td>
                </tr>


            </tbody>
        </table>
        <table width="100%">
            <tbody>
                <tr>
                    <td width="6%"></td>
                    <td width="50%">Civil Status:<span class="underline"> <?php echo $civilName?> </span></td>
                    <td width="50%">If married, name of spouse:<span class="underline"> <?php echo $name_spouse?> </span></td>
                </tr>


            </tbody>
        </table>

        <table width="100%">
            <tbody>
                <tr>
                    <td widt="7%"></td>
                    <td width="94%">
                        Number of family members (except you)
                    </td>
                </tr>

            </tbody>
        </table>


        <table width="100%">
            <tbody>
                <tr>
                    <td widt="10%"></td>
                    <td width="50%"><span class="underline"> <?php echo $farm_participate;?> </span>can participate in farm work
                    </td>
                    <td width="40%"><span class="underline"> <?php echo $cannot_participate;?> </span>cannot do farm work</td>
                </tr>

            </tbody>
        </table>


        <table width="100%">
            <tbody>
                <tr>
                    <td></td>
                    <td width="20%"><span class="underline"> <?php echo $male;?> </span>male</td>
                    <td width="70%"><span class="underline"> <?php echo $female;?> </span>female</td>
                </tr>

            </tbody>

        </table>
        <?php

function generateCheckboxes($sourceIncome)
{
    $classMapping = [
        4 => 'sale-of-agricultural-product',
        5 => 'employment',
        6 => 'business',
        7 => 'contract-labor',
        8 => 'agricultural-wage',
        10 => 'pldt',
        11 => 'cocoon-novelty',
    ];

    $isChecked = false;

    foreach ($classMapping as $value => $class) {
        // Check if the value exists in the sourceIncome array
        if (in_array($value, $sourceIncome)) {
            $isChecked = true;
            $class = 'check ' . $class;
        } else {
            $class = 'checkbox ' . $class;
        }

        // Generate a single checkbox for each label
        echo '<div class="' . $class . '"></div>';

        // Break out of the loop after the first match
        if ($isChecked) {
            break;
        }
    }
}

// Sample sourceIncome array (replace with your actual data)
$sourceIncome = [4, 7, 10];

?>


<table width="100%" style="margin-bottom: 10px">
    <tbody>
        <tr>
            <td width="6%"></td>
            <td class="bold">
                Source of income
            </td>
        </tr>
    </tbody>
</table>

<table width="100%">
    <tbody>
        <tr>
            <td width="5%"></td>
            <td width="10%">
            <div class="checkbox"></div>
                <label class="label">Sale of agricultural product</label>
            </td>

            <td width="15%">
            <div class="checkbox"></div>

                <label class="label">Contract Labor</label>
            </td>
        </tr>
    </tbody>
</table>

<table width="100%">
    <tbody>
        <tr>
            <td width="5%"></td>
            <td width="10%">
            <div class="checkbox"></div>
                <label class="label">Employment</label>
            </td>

            <td width="15%">
                <?php generateCheckboxes($sourceIncome); ?>
                <label class="label">Agricultural Wage</label>
            </td>
        </tr>
    </tbody>
</table>

<table width="100%" style="margin-bottom: 5px">
    <tbody>
        <tr>
            <td width="5%"></td>
            <td width="10%">
                <?php generateCheckboxes($sourceIncome); ?>
                <label class="label">Business</label>
            </td>

            <td width="15%">
            <div class="checkbox"></div>
                <label class="label">others (specify)</label>
            </td>
        </tr>
    </tbody>
</table>




<table width="75%">
    <tbody>
        <tr style="margin-bottom: 5px">
 
            <td></td>
            <td >Number of years in farming:<span class="underline"> <?php echo $years_in_farming;?>  </span></td>

        </tr>
        <tr  style="margin-bottom: 5px">
            <td width="10%"></td>
            <td>Number of available workers:<span class="underline"><?php echo $available_workers;?>  </span></td>
        </tr>
        <tr  style="margin-bottom: 5px">
            <td width="10%"></td>
            <td>
                Available farm tools and implements:
            </td>
        </tr>
    </tbody>
</table>


        <table width="100%">
    <tbody>
        <tr>
            <td width="5%"></td>
            <td width="10%">
            <div class="check"></div>
                
                <label class="label">Water pump</label>
            </td>

            <td width="15%">
            <div class="checkbox"></div>
            
                <label class="label">Knapsack sprayer</label>
            </td>
        </tr>
    </tbody>
</table>


<table width="100%">
    <tbody>
        <tr>
            <td width="5%"></td>
            <td width="10%">
            <div class="check"></div>
                
                <label class="label">Irrigation hose</label>
            </td>

            <td width="15%">
            <div class="checkbox"></div>
            
                <label class="label">Thresher</label>
            </td>
        </tr>
    </tbody>
</table>

<table width="100%">
    <tbody>
        <tr>
            <td width="5%"></td>
            <td width="10%">
            <div class="checkbox"></div>
                
                <label class="label">Hand Tractor</label>
            </td>

            <td width="15%">
            <div class="checkbox"></div>
            
                <label class="label">Farm Tools</label>
            </td>
        </tr>
    </tbody>
</table>


<table width="100%">
    <tbody>
        <tr>
            <td width="5%"></td>
            <td width="10%">
            <div class="check"></div>
                
                <label class="label">Draft animal</label>
            </td>

            <td width="15%">
            <div class="checkbox"></div>
            
                <label class="label">Plow</label>
            </td>
        </tr>
    </tbody>
</table>







    </body>

    </html>