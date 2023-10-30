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
                $region 	            = $row->region;
                $regName              =$row->regDesc;
                $province             = $row->province;
                $provName             = $row->provDesc;
                $municipality         = $row->municipality;
                $citymunName          = $row->citymunDesc;
                $barangay             = $row->barangay;
                $barangayName         = $row->brgyDesc;
                $address              = $row->address;
                $education            = $row->education;
                $educationName            = $row->education_name;
                $religion             = $row->religion;
                $civil_status         = $row->civil_status;
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
                $land_area             = $row->land_area;
                $area                   = $row->area;
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
                /* border: 1px solid black; */
                padding: 5px;
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
        </style>
    </head>

    <body>

        <table width="100%">
            <tbody>
            <!-- <td><img src="data:image/jpeg;base64,Logo.jpg"></td> -->
                <td class="center bold">SERICULTURE RESEARCH DEVELOPMENT INSTITUTE <br />
                    FARMER COOPERATOR'S INFORMATION <br />
                    and SITE INSPECTON SHEET </td>


            </tbody>
        </table>

        <br />
        <table width="100%">
            <tbody>
                <tr>

                    <td>Date of Validation: <span class="underline"> <?php echo $date_validation?> </span></td>
                </tr>
                <tr>

                    <td class="bold margin">A. Personal Information:</td>
                </tr>
            </tbody>
        </table>

        <table width="100%">
            <tbody>
                <tr>
                    <td width="55%">Name: <span class="underline"> <?php echo $name?> </span></td>
                    <td width="25%">Age:<span class="underline"> <?php echo $age?> </span></td>
                    <td width="20%">Sex: <span class="underline"> <?php echo $sex?> </span></td>
                </tr>
                <tr>
                    <td width="100%">Permanent Address: <span class="underline">  </span></td>
                </tr>
            </tbody>
        </table>

        <table width="100%">
            <tbody>
                <tr>
                    <td width="5%"></td>
                    <td width="50%">Educational Attainment:<span class="underline"> <?php echo $education?> </span></td>
                    <td width="25%">Religion:</td>
                </tr>


            </tbody>
        </table>
        <table width="100%">
            <tbody>
                <tr>
                    <td width="6%"></td>
                    <td width="25%">Civil Status:</td>
                    <td width="80%">If married, name of spouse:<span class="underline"> <?php echo $name_spouse?> </span></td>
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



        <table width="100%">
            <tbody>
                <tr>
                    <td width="10%"></td>
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
                        <label class="label">Sale of agricultura product</label>
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
                        <div class="checkbox"></div>
                        <label class="label">Agricultural Wage</label>
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
                        <label class="label">Business</label>
                    </td>

                    <td width="15%">
                        <div class="checkbox"></div>
                        <label class="label">others (specify)</label>
                    </td>

                </tr>

            </tbody>
        </table>


        
        <table width="100%">
            <tbody>
                <tr>
                    <td width="10%"></td>
                    <td>Number of years in farming:<span class="underline"> <?php echo $years_in_farming;?> </span></td>

                </tr>
                <tr>
                    <td width="10%"></td>
                    <td>Number of available workers:<span class="underline"> <?php echo $available_workers;?> </span></td>

                </tr>
                <tr>
                    <td width="10%"></td>
                    <td>
                Available farm tools and implements
                </td>

                </tr>
            </tbody>
        </table>

        <table width="100%">
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
                    <td widt="5%"></td>
                    <td>Farm Location/Address:<span class="underline"> <?php echo $location;?> </span></td>
                </tr>

                <tr>
                    <td class="bold" widt="5%"></td>
                    <td>Land Types:</td>
                    <td>Tenancy Status:</td>
                    <td>Area(Ha):<span class="underline"> <?php echo $area;?> </span></td>
                    <td>Crops Grown:</td>
                    <td>%Share:</td>
                </tr>
            </tbody>
        </table>

        
        <!-- NExt -->
        <div class="page-break"></div>
        <table width="100%">
            <tbody>
                <tr>
                  <td>Availability of reliable irrigation:</td>
                  <td>
                        <div class="checkbox"></div>
                        <label class="label">Available</label>
                    </td>
                    <td>
                        <div class="checkbox"></div>
                        <label class="label">Not Available</label>
                    </td>
                </tr>
            </tbody>
        </table>

        <table width="100%">
            <tbody>
                <tr>
                    <td></td>
                  <td >Water Source:</td>
                  <td>
                        <div class="checkbox"></div>
                        <label class="label">Irrigated</label>
                    </td>
                    <td>
                        <div class="checkbox"></div>
                        <label class="label">Rainfed</label>
                    </td>
                </tr>
            </tbody>
        </table>

        <table width="100%">
            <tbody>
                <tr>
                    <td></td>
                  <td >If irrigated, source of irrigation:</td>
                  <td>
                        <div class="checkbox"></div>
                        <label class="label">River</label>
                    </td>
                    <td>
                        <div class="checkbox"></div>
                        <label class="label">Deep well</label>
                    </td>
                    <td>
                        <div class="checkbox"></div>
                        <label class="label">NIA</label>
                    </td>
                </tr>
            </tbody>
        </table>

        <table width="100%">
            <tbody>
                <tr>
                  <td >Soil Type:</td>
                  <td>
                        <div class="checkbox"></div>
                        <label class="label">Sandy</label>
                    </td>
                    <td>
                        <div class="checkbox"></div>
                        <label class="label">Silty</label>
                    </td>
                    <td>
                        <div class="checkbox"></div>
                        <label class="label">Loam</label>
                    </td>
                </tr>
            </tbody>
        </table>

        <table width="100%">
            <tbody>
                <tr>
                  <td >Accessibility to farm to market road:</td>
                  <td>
                        <div class="checkbox"></div>
                        <label class="label">Accessible</label>
                    </td>
                    <td>
                        <div class="checkbox"></div>
                        <label class="label">Not Accessible</label>
                    </td>
                </tr>
            </tbody>
        </table>

        <table width="100%">
            <tbody>
                <tr>
                  <td >Distance from the main/barangay road: <span class="underline"> <?php echo $distance;?> </span></td>  
                </tr>
            </tbody>
        </table>

        <table width="100%">
            <tbody>
                <tr>
                  <td >Available land area for planting mulberry: <span class="underline"> <?php echo $land_area;?> </span>ha:</td>  
                </tr>
            </tbody>
        </table>

        <table width="100%">
            <tbody>
                <tr>
                    <td width="50%"></td>
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

        <table width="100%">
            <tbody>
                <tr>
                  <td >Name</td>
                  <td >Position</td> 
                  <td >Signature</td>  
                  <td >Date</td>  
                </tr>
            </tbody>
        </table>
        
        <table width="100%">
            <tbody>
                <tr>
        
                    <td class="bold">
          B. Production
                </td>
    
                </tr>
            </tbody>
        </table>

        <table width="100%">
            <tbody>
                <tr>
                    <td >Production Date: <?php echo $production_date ?></td>
                </tr>
            </tbody>
        </table>    



        <table width="100%">
            <tbody>
                <tr>
                    <td >Production Cost: <?php echo $location ?>  </td>
                    <td>Gross Income: <?php echo  $p_income  ?> </td>
                    <td>Production Cost: <?php echo $p_cost  ?> </td>
                    <td>Net Income: <?php echo $n_income  ?> </td>
                </tr>
            </tbody>
        </table>



    </body>

    </html>