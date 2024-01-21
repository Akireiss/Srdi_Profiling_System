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
             $result=$db->getSiteID($_GET['site_id']);
            while($row=mysqli_fetch_object($result)){
              
            //Site Table
                $location             = $row->location; 
                $distance             = $row->distance; 
                $land_area            = $row->land_area;
                $area                 = $row->area;
                $crops                 = $row->crops;
                $share                 = $row->share;
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
            </tbody>
        </table>





        <table width="100%">
            <tbody>
                <tr>

        <tr>
                    <td></td>
                    <td class="bold" width="15%">Land Types:</td>
                    <td class="bold" width="20%">Tenancy Status:</td>
                    <td class="bold" width="15%">Area(Hectares):<span class="underline"> <?php echo $area;?> </span></td>
                    <td class="bold" width="20%">Crops Grovwn:<span class="underline"> <?php echo $crops;?> </span></td>
                    <td class="bold" width="20%">%Share:<span class="underline"> <?php echo $share;?></td>
                </tr>


                </tr>
          
        <!-- Data here -->


        
       
         
                <tr>

        <tr>
                    <td></td>

                    <td  width="14%">
                        <div class="checkbox"></div>
                    <label for="Uplands">Uplands</label>
                </td>

                    <td width="20%"><div class="checkbox"></div>
                    <label for="Uplands">Owned</label></td>

                    <td  width="20%"><span class="underline"></span></td>

                    <td width="20%"></td>

                    <td  width="20%"></td>
                </tr>


                </tr>
            </tbody>
        </table>

        
      
  

        <table width="100%">
            <tbody>
                <tr>

        <tr>
                    <td></td>

                    <td width="14%">
                        <div class="checkbox"></div>
                    <label for="Uplands">Low</label>
                </td>

                    <td  width="20%"><div class="checkbox"></div>
                    <label for="Uplands">Leased</label></td>

                    <td  width="20%"><span class="underline"></span></td>

                    <td  width="20%"></td>

                    <td  width="20%"></td>
                </tr>


                </tr>
            </tbody>
        </table>
    


        <table width="100%">
            <tbody>
                <tr>

        <tr>
                    <td width=""></td>

                    <td width="14%""><div class="checkbox"></div>
                    <label for="Uplands">Hilly</label></td>

                    <td" width="20%"><div class="checkbox"></div>
                    <label for="Uplands">Tenancy</label></td>

                    <td" width="20%"><span class="underline">  </span></td>

                    <td" width="20%"></td>

                    <td" width="20%"></td>
                </tr>


                </tr>
            </tbody>
        </table>
    



        <!-- NExt -->
        <div class="page-break"></div>

        <br>
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
        <td width="10%">

        </td>
      <td  width="40%">Water Source:</td>
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
                <td ">
                  <td>If irrigated, source of irrigation:</td>
                  <td  >
                        <div class="checkbox"></div>
                        <label class="label">River</label>
                    </td>


                    <td>
                        <div class="checkbox"></div>
                        <label class="label">Deep well</label>
                    </td>

                    <td class="mb">
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
                  <td >Available land area for planting mulberry: <span class="underline"> <?php echo $land_area;?> </span>hectares:</td>  
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
                  <td  width="25%">Name <div class="underline"> <?php echo $names;?> </div></td>
                  <td width="25%">Position <div class="underline"> <?php echo $position;?> </d></td> 
                  <td >Signature</td>  
                  <td width="20%">Date <div class="underline"> <?php echo $date;?> </div></td>  
                </tr>
            </tbody>
        </table>
        <table width="100%">
            <tbody>
                <tr>
                  <td  width="25%">Name <div class="underline"> <?php echo $name1;?> </div></td>
                  <td width="25%">Position <div class="underline"> <?php echo $position1;?> </d></td> 
                  <td >Signature</td>  
                  <td width="20%">Date <div class="underline"> <?php echo $date1;?> </div></td>  
                </tr>
            </tbody>
        </table>
        <table width="100%">
            <tbody>
                <tr>
                  <td  width="25%">Name <div class="underline"> <?php echo $name2;?> </div></td>
                  <td width="25%">Position <div class="underline"> <?php echo $position2;?> </d></td> 
                  <td width="25%">Signature <div class="underline"></td>  
                  <td width="20%">Date <div class="underline"> <?php echo $date2;?> </div></td>  
                </tr>
            </tbody>
        </table>
        
        <table width="100%">
            <tbody>
                <tr>

    <br>           
    <td class="bold">
          B. Production
                </td>
    
                </tr>
            </tbody>
        </table>

        <table width="100%">
            <tbody>
                <tr>
                    <td >Production Date:<span class="underline"> <?php echo $production_date;?></td>
                </tr>
            </tbody>
        </table>    



        <table width="100%">
            <tbody>
                <tr>
                    <!-- <td width ="30%">Project Site Location: <div class="underline"> <?php echo $location;?> </td> -->
                    <td width ="15%">Gross Income: <div class="underline"> <?php echo $p_income;?> </td>
                    <td width ="15%">Production Cost: <div class="underline"> <?php echo $p_cost;?> </td>
                    <td width ="10%">Net Income: <div class="underline"> <?php echo $n_income;?> </td>
                </tr>
            </tbody>
            <tbody>
<!--                 ?php
$result = $db->getCocoonProducer($cocoonID);
while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    // echo '<td>' . $row['location'] . '</a></td>';

    echo '</tr>';
}
?> -->
            </tbody>
        </table>

       



    </body>

    </html>