<?php
error_reporting(0);
session_start();
class db
{
    public $con;
    public function __construct()
    {
        $this->$con = mysqli_connect('localhost', 'root', '', 'profiling_system') or die(mysqli_error());
    }

    // function __construct(){
    // 	$this->$con = mysqli_connect('localhost', 'root', '', 'srdi_profile') or die(mysqli_error());
    // }
    public function getTotalProduction() {
        $query = "SELECT SUM(total_production) as total FROM production";
        $result = mysqli_query($this->con, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
    

    public function getUser()
    {
        $sql = "SELECT * FROM users as a
			   LEFT JOIN user_type as b
		       ON a.type_id = b.user_type_id";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getUserActive()
    {
        $sql = "SELECT * FROM users
				WHERE user_status = 'Active'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getUserID($user_id)
    {
        $sql = "SELECT * FROM users
				 WHERE user_id='$user_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
    public function getUserType()
    {
        $sql = "SELECT * FROM user_type";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getUserTypeActive()
    {
        $sql = "SELECT * FROM user_type
				WHERE user_type_status = 'Active'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getUserTypeID($user_type_id)
    {
        $sql = "SELECT * FROM user_type
				 WHERE user_type_id='$user_type_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
    public function getEducation()
    {
        $sql = "SELECT * FROM education";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getEducationActive()
    {
        $sql = "SELECT * FROM education
				WHERE education_status = 'Active'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getEducationID($education_id)
    {
        $sql = "SELECT * FROM education
				 WHERE education_id='$education_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }

    public function getSource_Income()
    {
        $sql = "SELECT * FROM source_income";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getSource_IncomeActive()
    {
        $sql = "SELECT * FROM source_income
				WHERE source_status = 'Active'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getSource_IncomeID($source_id)
    {
        $sql = "SELECT * FROM source_income
				 WHERE source_id='$source_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
    public function getReligion()
    {
        $sql = "SELECT * FROM religion";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getReligionActive()
    {
        $sql = "SELECT * FROM religion
				WHERE religion_status = 'Active'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getReligionID($religion_id)
    {
        $sql = "SELECT * FROM religion
				 WHERE religion_id='$religion_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }

    public function getTenancy()
    {
        $sql = "SELECT * FROM tenancy";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getTenancyActive()
    {
        $sql = "SELECT * FROM tenancy
				WHERE tenancy_status = 'Active'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getTenancyID($tenancy_id)
    {
        $sql = "SELECT * FROM tenancy
				 WHERE tenancy_id='$tenancy_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
    public function getFarmTools()
    {
        $sql = "SELECT * FROM farm_tool";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getFarmToolsActive()
    {
        $sql = "SELECT * FROM farm_tool
				WHERE tool_status = 'Active'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getFarmToolsID($tool_id)
    {
        $sql = "SELECT * FROM farm_tool
				 WHERE tool_id='$tool_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
    public function getLand()
    {
        $sql = "SELECT * FROM land";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getLandActive()
    {
        $sql = "SELECT * FROM land
				WHERE land_status = 'Active'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getLandID($land_id)
    {
        $sql = "SELECT * FROM land
				 WHERE land_id='$land_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
    public function getTopography()
    {
        $sql = "SELECT * FROM topography";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getTopographyActive()
    {
        $sql = "SELECT * FROM topography
				WHERE topography_status = 'Active'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getTopographyID($topography_id)
    {
        $sql = "SELECT * FROM topography
				 WHERE topography_id='$topography_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
    public function getIrrigation()
    {
        $sql = "SELECT * FROM irrigation";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getIrrigationActive()
    {
        $sql = "SELECT * FROM irrigation
				WHERE irrigation_status = 'Active'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getIrrigationID($irrigation_id)
    {
        $sql = "SELECT * FROM irrigation
				 WHERE irrigation_id='$irrigation_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
    public function getSoil()
    {
        $sql = "SELECT * FROM soil";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getSoilActive()
    {
        $sql = "SELECT * FROM soil
				WHERE soil_status = 'Active'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getSoilID($soil_id)
    {
        $sql = "SELECT * FROM soil
				 WHERE soil_id='$soil_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
    public function getRegion()
    {
        $sql = "SELECT * FROM region";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getRegionID($region_id)
    {
        $sql = "SELECT * FROM region
				 WHERE region_id='$region_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
    
    public function getProvince()
    {
        $sql = "SELECT p.province_id, p.provDesc, p.provCode, r.regCode, r.regDesc
		FROM province p
		JOIN region r ON p.regCode = r.regCode";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
    public function getProvinceID($province_id)
    {
        $sql = "SELECT * FROM province
				 WHERE province_id='$province_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
   
    public function getMunicipality()
    {
        $sql = "SELECT m.*, p.province_id, p.provDesc, p.regCode AS provRegCode,
		r.regCode AS regRegCode, r.regDesc,
		m2.municipality_id AS parentMunicipality_id, m2.citymunDesc AS parentCitymunDesc
		FROM municipality m
		JOIN province p ON m.provCode = p.provCode
		JOIN region r ON p.regCode = r.regCode
		LEFT JOIN municipality m2 ON m.citymunCode = m2.municipality_id";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getMunicipalityID($municipality_id)
    {
        $sql = "SELECT * FROM municipality
				 WHERE municipality_id='$municipality_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
    public function getBarangay()
    {
        $sql = "SELECT b.*, p.province_id, p.provDesc, p.regCode AS provRegCode,
                r.regCode AS regRegCode, r.regDesc,
                m.municipality_id AS parentMunicipality_id, m.citymunDesc AS parentCitymunDesc
                FROM barangay b
                JOIN province p ON b.provCode = p.provCode
                JOIN region r ON p.regCode = r.regCode
                LEFT JOIN municipality m ON b.citymunCode = m.municipality_id";
        
        $result = mysqli_query($this->$con, $sql);
        
        return $result;
    }

    public function getProducer()
    {
        $sql = "SELECT * FROM cocoon
                LEFT JOIN region
                ON cocoon.region = region.regCode
                LEFT JOIN province
                ON cocoon.province = province.provCode
                LEFT JOIN municipality
                ON cocoon.municipality = municipality.citymunCode";
        // echo $sql;
        // echo die();
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    
    
    public function getProducerID($cocoon_id)
    {
        $sql = "SELECT * FROM cocoon
                LEFT JOIN region
                ON cocoon.region = region.regCode
                LEFT JOIN province
                ON cocoon.province = province.provCode
                LEFT JOIN municipality
                ON cocoon.municipality = municipality.citymunCode
                LEFT JOIN barangay
                ON cocoon.barangay = barangay.brgyCode
                LEFT JOIN site
                ON cocoon.cocoon_id = site.producer_id
                LEFT JOIN production 
                ON cocoon.cocoon_id = production.producer_id
				WHERE cocoon_id='$cocoon_id'";
        //          echo $sql;
        // echo die();
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
    public function getProducersActive()
    {
        $sql = "SELECT * FROM cocoon
				WHERE status = 'Active'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getSiteLocationActive()
    {
        $sql = "SELECT * FROM site
				WHERE status = 'Active'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }

   
    public function getSite($cocoonID)
    {
        $sql = "SELECT * FROM site
                LEFT JOIN topography
                ON site.topography = topography.topography_id
                WHERE site.producer_id = $cocoonID";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getSites()
    {
        $sql = "SELECT * FROM site
                LEFT JOIN topography
                ON site.topography = topography.topography_id
                LEFT JOIN cocoon
                ON site.producer_id =cocoon.cocoon_id";
        //           echo $sql;
        // echo die();
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    
    
    public function getSiteID($site_id)
    {
        $sql = "SELECT * FROM site
                LEFT JOIN cocoon
                ON site.producer_id = cocoon.cocoon_id 
                LEFT JOIN region
                ON site.region = region.regCode
                LEFT JOIN province
                ON site.province = province.provCode
                LEFT JOIN municipality
                ON site.municipality = municipality.citymunCode
                LEFT JOIN barangay
                ON site.barangay = barangay.brgyCode
				WHERE site_id='$site_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
 
    // public function getAllProduction()
    // {
    //     $sql = "SELECT * FROM production
    //             LEFT JOIN site
    //             ON production.site_id = site.site_id
    //             LEFT JOIN cocoon
    //             ON site.producer_id = cocoon.cocoon_id";
    //             echo $sql;
    //             echo die();
    //     $result = mysqli_query($this->$con, $sql);
    //     return $result;
    // }
    public function getAllProduction()
    {
        $sql = "SELECT * FROM production
                LEFT JOIN cocoon
                ON production.producer_id = cocoon.cocoon_id";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
   

    public function getProduction($siteID)
    {
        $sql = "SELECT * FROM production
        WHERE site_id = '$siteID'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
   
   ///true//
    // public function getProductionID($production_id)
    // {
    //     $sql = "SELECT * FROM production
    //             LEFT JOIN site
    //             ON production.site_id = site.site_id 
	// 			 WHERE production_id='$production_id'";
    //     $result = mysqli_query($this->$con, $sql);
    //     return $result;

    // }
    public function getProductionID($production_id)
    {
        $sql = "SELECT * FROM production
                LEFT JOIN cocoon
                ON production.producer_id = cocoon.cocoon_id 
				 WHERE production_id='$production_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }

    public function getMonitoring()
    {
        $sql = "SELECT * FROM monitoring";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getMonitoringID($monitoring_id)
    {
        $sql = "SELECT * FROM monitoring
				 WHERE monitoring_id='$monitoring_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
    public function getAgency()
    {
        $sql = "SELECT * FROM agency";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getAgencyID($agency_id)
    {
        $sql = "SELECT * FROM agency
				 WHERE agency_id='$agency_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
    public function getAgencyActive()
    {
        $sql = "SELECT * FROM agency
				WHERE status = 'Active'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getCivil()
    {
        $sql = "SELECT * FROM civil";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getCivilID($civil_id)
    {
        $sql = "SELECT * FROM civil
				 WHERE civil_id='$civil_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }
    public function getCivilActive()
    {
        $sql = "SELECT * FROM civil
				WHERE status = 'Active'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getAuditTrail()
    {
        $sql = "SELECT * FROM audit_logs
                LEFT JOIN users
                ON audit_logs.user_id =users.user_id ";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    

    public function updateEducation($education_id, $education_name, $education_status)
    {
        $sql = "UPDATE education
				SET education_name = '$education_name',
					education_status	='$education_status'
				WHERE education_id	= '$education_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result = 1;
    }
    public function updateReligion($religion_id, $religion_name, $religion_status)
    {
        $sql = "UPDATE religion
				SET religion_name = '$religion_name',
					religion_status	='$religion_status'
				WHERE religion_id	= '$religion_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result = 1;
    }
    public function updateTopography($topography_id, $topography_name, $topography_status)
    {
        $sql = "UPDATE topography
				SET topography_name = '$topography_name',
					topography_status	='$topography_status'
				WHERE topography_id	= '$topography_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result = 1;
    }
    public function updateFarmTools($tool_id, $tool_name, $tool_status)
    {
        $sql = "UPDATE farm_tool
				SET tool_name = '$tool_name',
					tool_status	='$tool_status'
				WHERE tool_id	= '$tool_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result = 1;
    }
    public function updateSource_Income($source_id, $source_name, $source_status)
    {
        $sql = "UPDATE source_income
				SET source_name = '$source_name',
					source_status	='$source_status'
				WHERE source_id	= '$source_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result = 1;
    }
    public function updateLand($land_id, $land_name, $land_status)
    {
        $sql = "UPDATE land
				SET land_name = '$land_name',
					land_status	='$land_status'
				WHERE land_id	= '$land_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result = 1;
    }
    public function updateTenancy($tenancy_id, $tenancy_name, $tenancy_status)
    {
        $sql = "UPDATE tenancy
				SET tenancy_name = '$tenancy_name',
					tenancy_status	='$tenancy_status'
				WHERE tenancy_id	='$tenancy_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result = 1;
    }

    public function updateIrrigation($irrigation_id, $irrigation_name, $irrigation_status)
    {
        $sql = "UPDATE irrigation
				SET irrigation_name = '$irrigation_name',
					irrigation_status	='$irrigation_status'
				WHERE tenancy_id	='$irrigation_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result = 1;
    }
    public function updateSoil($soil_id, $soil_name, $soil_status)
    {
        $sql = "UPDATE soil
				SET soil_name = '$soil_name',
				soil_status	='$soil_status'
				WHERE soil_id	= '$soil_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result = 1;
    }
    public function updateUserType($user_type_id, $user_type_name, $user_type_status)
    {
        $sql = "UPDATE user_type
				SET user_type_name = '$user_type_name',
				user_type_status	='$user_type_status'
				WHERE user_type_id	= '$user_type_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result = 1;
    }
    public function updateUser($user_id, $fullname, $username, $password, $type_id, $user_status)
    {
        $sql = "UPDATE users
				SET fullname = '$fullname',
					username='$username',
					password='$password',
					type_id='$type_id',
				   	user_status	='$user_status'
				WHERE user_id	= '$user_id'";
        // echo $sql;
        // echo die();
        $result = mysqli_query($this->$con, $sql);
 
        return $result = 1;
    }
    
    public function updateRegion($region_id, $regDesc, $psgcCode, $regCode)
    {
        $sql = "UPDATE region
				SET psgcCode = '$psgcCode',
				regDesc = '$regDesc',
					regCode = '$regCode'
				WHERE region_id = '$region_id'";

        $result = mysqli_query($this->con, $sql);

        return $result = 1;
    }
    public function updateProvince($province_id, $psgcCode, $provDesc, $regCode, $provCode)
    {
        $sql = "UPDATE province
				SET psgcCode = '$psgcCode',
					provDesc = '$provDesc',
					regCode = '$regCode'
					provCode = '$provCode',
				WHERE region_id = '$province_id'";

        $result = mysqli_query($this->con, $sql);

        return $result = 1;
    }
    public function updateMunicipality($municipality_id, $citymunDesc, $psgcCode, $regCode, $provCode, $citymunCode)
    {
        $sql = "UPDATE municipality
				SET citymunDesc = '$citymunDesc',
					psgcCode = '$psgcCode',
					regCode = '$regCode'
					provCode = '$provCode'
					citymunCode = '$citymunCode'
				WHERE municipality_id = '$municipality_id'";

        $result = mysqli_query($this->con, $sql);

        return $result = 1;
    }
    public function updateProducer($cocoon_id, $name)
    {
         $sql = "UPDATE cocoon 
                SET name                 ='$name',						
                WHERE cocoon_id          ='$cocoon_id'";
            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
        public function updateProduction($producer_id, $production_id, $production_date, $total_production, $p_income, $p_cost, $n_income)
{
    $sql = "UPDATE production
            SET producer_id = '$producer_id',
                production_date = '$production_date',
                total_production = '$total_production',
                p_income = '$p_income',
                p_cost = '$p_cost',
                n_income = '$n_income'  
            WHERE production_id = '$production_id'";
//   echo $sql;
//         echo die();
    $result = mysqli_query($this->con, $sql);

    if ($result) {
        return 1; // Update successful
    } else {
        return 0; // Update failed
    }
}

public function updateAgency($agency_id, $agency_name, $status)
{
    $sql = "UPDATE agency
            SET agency_name = '$agency_name',
                status	    ='$status'
            WHERE agency_id	= '$agency_id'";
            
    $result = mysqli_query($this->$con, $sql);
    return $result = 1;
}

public function updateMonitoring($monitoring_id, $monitoring_name, $position, $status)
    {
        $sql = "UPDATE monitoring
				SET monitoring_name = '$monitoring_name',
                    position = '$position',
					status	='$status'
				WHERE monitoring_id	= '$monitoring_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result = 1;
    }
    public function updateCivil($civil_id, $civil_name, $status)
{
    $sql = "UPDATE civil
            SET civil_name = '$civil_name',
                status	    ='$status'
            WHERE civil_id	= '$civil_id'";
            
    $result = mysqli_query($this->$con, $sql);
    return $result = 1;
}
    


    public function addUser($fullname, $username, $password, $type_id, $status, $user_id)
    {
    $checkUser = "SELECT * FROM users
						WHERE fullname = '$fullname'";
    $resultCheckUser = mysqli_query($this->$con, $checkUser);
    $num_rows = mysqli_num_rows($resultCheckUser);
    if($num_rows > 0) {
        return $resultsql = 0;
    } else {
        $sqlUser = "INSERT INTO users (fullname, username, password, type_id, user_status)
						VALUES ('$fullname',
								'$username',
								'$password',
								'$type_id',
								'$status')";
        $resultsql = mysqli_query($this->$con, $sqlUser);

        if ($resultsql) {
            // Log the action in the audit_logs table
            $action = "New User Added: " . $funding_agency;
            $data = json_encode(['user_name' => $username, 'fullname' => $fullname, 'status' => $status]);

            $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$user_id', '$action', '$data')";
            $auditResult = mysqli_query($this->$con, $auditSql);


            return $resultsql = 1;
        }
    }
}
    public function addUserType($user_type, $status)
    {
        $checkUser = "SELECT * FROM user_type
						WHERE user_type_name = '$user_type'";
        $resultCheckUser = mysqli_query($this->$con, $checkUser);
        $num_rows = mysqli_num_rows($resultCheckUser);
        if($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sqlUser = "INSERT INTO user_type (user_type_name, user_type_status)
						VALUES ('$user_type',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sqlUser);
            return $resultsql = 1;
        }
    }
    public function addEducation($education, $status)
    {
        $check = "SELECT * FROM education
						WHERE education_name = '$education'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO education (education_name, education_status)
						VALUES ('$education',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
    }
    public function addMunicipality($municipality, $status)
    {
        $check = "SELECT * FROM municipality
						WHERE municipality_name = '$municipality'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO municipality (municipality_name, municipality_status)
						VALUES ('$municipality',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
    }
    public function addSource_Income($source_of_income, $status)
    {
        $check = "SELECT * FROM source_income
						WHERE source_name = '$source_of_income'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO source_income (source_name, source_status)
						VALUES ('$source_of_income',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
    }
    public function addReligion($religion, $status)
    {
        $check = "SELECT * FROM religion
						WHERE religion_name = '$religion'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO religion (religion_name, religion_status)
						VALUES ('$religion',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
    }
    public function addTenancy($tenancy_status, $status)
    {
        $check = "SELECT * FROM tenancy
						WHERE tenancy_name = '$tenancy_status'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO tenancy (tenancy_name, tenancy_status)
						VALUES ('$tenancy_status',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
    }

    public function addFarmTools($farm_tools, $status)
    {
        $check = "SELECT * FROM farm_tool
						WHERE tool_name = '$farm_tools'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO farm_tool (tool_name, tool_status)
						VALUES ('$farm_tools',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
    }
    public function addLand($land_type, $status)
    {
        $check = "SELECT * FROM land
						WHERE land_name = '$land_type'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO land (land_name, land_status)
						VALUES ('$land_type',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
    }
    public function addTopography($topography, $status)
    {
        $check = "SELECT * FROM topography
						WHERE topography_name = '$topography'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO topography (topography_name, topography_status)
						VALUES ('$topography',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
    }
    public function addIrrigation($source_of_irrigation, $status)
    {
        $check = "SELECT * FROM irrigation
						WHERE irrigation_name = '$source_of_irrigation'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO irrigation (irrigation_name, irrigation_status)
						VALUES ('$source_of_irrigation',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
    }
    public function addSoil($soil_type, $status)
    {
        $check = "SELECT * FROM soil
						WHERE soil_name = '$soil_type'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO soil (soil_name, soil_status)
						VALUES ('$soil_type',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
    }
    public function addRegion($regDesc, $regCode)
    {
        $check = "SELECT * FROM region
						WHERE regDesc = '$regDesc' OR regCode = '$regCode'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $psgCode = $regCode . '0000000';
            $sql = "INSERT INTO region (psgcCode, regDesc, regCode)
						VALUES ('$psgCode',
								'$regDesc',					
								'$regCode')";

            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
    }
    public function addProvince($provDesc, $provCode)
    {
        $check = "SELECT * FROM province
						WHERE provDesc = '$provDesc' OR provCode = '$provCode'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $psgCode = $provCode . '0000000';
            $sql = "INSERT INTO province (psgcCode, provDesc, provCode)
						VALUES ('$psgCode',
								'$provDesc',					
								'$provCode')";

            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
    }
       
    public function addProducer($user_id, $name, $birthdate,
    $age, $type, $sex, $region, $province, $municipality, 
    $barangay, $address, $education, $religion, $civil_status, 
    $name_spouse, $farm_participate, $cannot_participate, $male,
     $female, $source_income, $years_in_farming, $available_workers,
     $selectedFarmToolsJSON, $intent, $signature, $id_pic, $bypic, $date_validation)
    {
        $check = "SELECT * FROM cocoon
						WHERE name = '$name'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if($num_rows > 0) {
            return $resultsql = 0;
        } else {
    $sql = "INSERT INTO cocoon (name, birthdate, 
             age, type, sex, region, province, municipality, barangay,
              address, education, religion, civil_status, name_spouse, farm_participate,
               cannot_participate, male, female, source_income, years_in_farming, 
               available_workers, farm_tool, intent, signature, id_pic, bypic, date_validation)
						VALUES ('$name',					
                                '$birthdate',
                                '$age',
                                '$type',
                                '$sex',
                                '$region',
                                '$province',
                                '$municipality',
                                '$barangay',
                                '$address',
                                '$education',
                                '$religion',
                                '$civil_status',
                                '$name_spouse',
                                '$farm_participate',
                                '$cannot_participate',
                                '$male',
                                '$female',
                                '$source_income',
                                '$years_in_farming',
                                '$available_workers',
                                '$selectedFarmToolsJSON',
                                '$intent',
                                '$signature',
                                '$id_pic',
                                '$bypic',
                                '$date_validation')";
    $resultsql = mysqli_query($this->$con, $sql);

    if ($resultsql) {
        // Log the action in the audit_logs table
        $action = "Add Cocoon Producer: ";
        $data = json_encode(['name' => $name, 'birthdate' => $birthdate, 'age'  => $age, 'type' =>$type, 'sex' => $sex, 'region' => $region,
                            'province'  => $province, 'municipality' => $municipality,  'barangay' => $barangay, 'address' => $address,
                             'education' => $education, 'religion' => $religion, 'civil_status' => $civil_status, 'name_spouse' => $name_spouse,
                            'farm_participate' => $farm_participate, 'cannot_participate' => $cannot_participate, 'male' => $male, 'female' => $female,
                        'source_income' => $source_income, 'years_in_farming' => $years_in_farming, 'available_workers' => $available_workers,
                    'selectedFarmToolsJSON' => $selectedFarmToolsJSON]);

        $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$user_id', '$action', '$data')";
        $auditResult = mysqli_query($this->$con, $auditSql);
        return $resultsql = 1;
    }
}
    }


  
    public function addSite($location, $producer_id, $topography, $region, $province, 
    $municipality, $barangay, $address, $landJson,$tenancyJson, $area, $crops, $share, $irrigation, 
    $water, $source,$soil, $market, $distance, $land_area, $agency, $charge, $adopters, $remarks,
    $names, $position, $date)
    {
        $check = "SELECT * FROM site
						WHERE location = '$location'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if($num_rows > 0) {
            $sql = "INSERT INTO site (location, producer_id, topography, region, province,
            municipality, barangay, address, land, tenancy, area, crops, share, irrigation, 
            water, source,market, distance, land_area, agency, charge, adopters,
            remarks, names, position, date,  soil)
						VALUES ('$location',					
								'$producer_id',
                                '$topography',
                                '$region',
                                '$province',
                                '$municipality',
                                '$barangay',
                                '$address',
                                '$landJson',
                                '$tenancyJson',
                                '$area',
                                '$crops',
                                '$share',
                                '$irrigation',
                                '$water',
                                '$source',
                                '$market',
                                '$distance',
                                '$land_area',
                                '$agency',
                                '$charge',
                                '$adopters', 
                                '$remarks', 
                                '$names', 
                                '$position', 
                                '$date', 
                                '$soil')";
            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        } else {
            $sql = "INSERT INTO site (location, producer_id, topography, region, province,
            municipality, barangay, address, land, tenancy, area, crops, share, irrigation, 
            water, source,market, distance, land_area, agency, charge, adopters,
            remarks, names, position, date,  soil)
						VALUES ('$location',					
								'$producer_id',
                                '$topography',
                                '$region',
                                '$province',
                                '$municipality',
                                '$barangay',
                                '$address',
                                '$landJson',
                                '$tenancyJson',
                                '$area',
                                '$crops',
                                '$share',
                                '$irrigation',
                                '$water',
                                '$source',
                                '$market',
                                '$distance',
                                '$land_area',
                                '$agency',
                                '$charge',
                                '$adopters', 
                                '$remarks', 
                                '$names', 
                                '$position', 
                                '$date', 
                                '$soil')";
            $resultsql = mysqli_query($this->$con, $sql);
            if ($resultsql) {
                // Log the action in the audit_logs table
                $action = "Added project site location: ";
                $data = json_encode(['location' => $location, 'producer_id' => $producer_id, 'topography'  => $topography,  'region' => $region,
                                    'province'  => $province, 'municipality' => $municipality,  'barangay' => $barangay, 'address' => $address,
                                     'landJson' => $landJson, 'tenancyJson' => $tenancyJson, 'area' => $area, 'crops' => $crops,
                                    'share' => $share, 'irrigation' => $irrigation, 'water' => $water, 'source' => $source,
                                'market' => $market, 'distance' => $distance, 'land_area' => $land_area, 'agency' => $agency, 'charge' => $charge,
                                'adopters' => $adopters, 'remarks' => $remarks, 'names' => $names, 'position' => $position, 'date' => $date, 'soil' => $soil]);
        
                                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$user_id', '$action', '$data')";
                                $auditResult = mysqli_query($this->$con, $auditSql);
                                return $resultsql = 1;
            }
           
        }
    }
    public function addProduction($producer_id, $production_date, $total_production, $p_income, $p_cost, $n_income)
    {
        $check = "SELECT * FROM production
						WHERE production_date = '$production_date'";
                       
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO production (producer_id,production_date, total_production, p_income, p_cost, n_income)
						VALUES ('$producer_id',     
                                '$production_date',					
								'$total_production',
                                '$p_income',
                                '$p_cost',
                                '$n_income')";
                            
            $resultsql = mysqli_query($this->$con, $sql);
            if ($resultsql) {
                // Log the action in the audit_logs table
                $action = "Add production: ";
                $data = json_encode(['producer_id' => $producer_id, 'production_date' => $production_date, 'total_production'  => $total_production,  'p_income' => $p_income,
                                    'p_cost'  => $p_cost, 'n_income' => $n_income]);
        
                                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$user_id', '$action', '$data')";
                                $auditResult = mysqli_query($this->$con, $auditSql);
                                return $resultsql = 1;
            }
      
        }
    }


    public function addMonitoring($name, $position, $status)
    {
        $check = "SELECT * FROM monitoring
						WHERE monitoring_name = '$name'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO monitoring (monitoring_name, position, status)
						VALUES ('$name',
                                '$position',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
    }
    public function addCivil($civil_status, $status)
    {
        $check = "SELECT * FROM civil
						WHERE civil_name = '$civil_status'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO civil (civil_name, status)
						VALUES ('$civil_status',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
    }


   // Function to count Cocoon Producers


       //Count Total Production
    public function countTotalProduction() {
        $sql = "SELECT SUM(total_production) AS total_production_count FROM production";
        $result = $this->con->query($sql);
    
        if (!$result) {
            die("Query failed: " . $this->con->error);
        }
    
        $row = $result->fetch_assoc();
        return $row['total_production_count'];
    }


public function countCocoon()
{
    $check = "SELECT COUNT(*) AS count FROM cocoon";
    $resultCheck = mysqli_query($this->$con, $check);
    $row = mysqli_fetch_assoc($resultCheck);
    return $row['count'];
}
public function countCocoonInactive()
{
    $check = "SELECT COUNT(*) AS count FROM cocoon WHERE status = 'Inactive'";
    $resultCheck = mysqli_query($this->$con, $check);
    $row = mysqli_fetch_assoc($resultCheck);
    return $row['count'];
}



// Function to count System Users// Function to count System Users
public function countUsers()
{
    $check = "SELECT COUNT(*) AS count FROM users";
    $resultCheck = mysqli_query($this->$con, $check);
    $row = mysqli_fetch_assoc($resultCheck);
     // I-output ang resulta para sa debugging
    return $row['count'];
}
public function countSite()
{
    $check = "SELECT COUNT(*) AS count FROM site";
    $resultCheck = mysqli_query($this->$con, $check);
    $row = mysqli_fetch_assoc($resultCheck);
     // I-output ang resulta para sa debugging
    return $row['count'];
}
public function countProduction()
{
    $check = "SELECT COUNT(*) AS count FROM production";
    $resultCheck = mysqli_query($this->$con, $check);
    $row = mysqli_fetch_assoc($resultCheck);
    return $row['count'];
}



public function addAgency($funding_agency, $status, $user_id)
{
    $check = "SELECT * FROM agency WHERE agency_name = '$funding_agency'";
    $resultCheck = mysqli_query($this->$con, $check);
    $num_rows = mysqli_num_rows($resultCheck);

    if ($num_rows > 0) {
        return $resultsql = 0; // Agency already exists
    } else {
        $sql = "INSERT INTO agency (agency_name, status) VALUES ('$funding_agency', '$status')";
        $resultsql = mysqli_query($this->$con, $sql);

        if ($resultsql) {
            // Log the action in the audit_logs table
            $action = "Added agency: " . $funding_agency;
            $data = json_encode(['agency_name' => $funding_agency, 'status' => $status]);

            $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$user_id', '$action', '$data')";
            $auditResult = mysqli_query($this->$con, $auditSql);

            if ($auditResult) {
                return 1; // Agency added and logged in audit_logs
            } else {
                return -1; // Agency added, but audit logging failed
            }
        } else {
            return -1; // Agency insertion failed
        }
    }
}
    public function checkLogin($username, $password)
    {
        $checkLogin = "SELECT * FROM users as a
					LEFT JOIN user_type as b
					ON a.type_id = b.user_type_id
					WHERE username = '$username'
					AND password = '$password'
					AND user_status = 'Active'";
        // echo $checkLogin; die();
        $resultCheckLogin = mysqli_query($this->$con, $checkLogin);
        $num_rows = mysqli_num_rows($resultCheckLogin);

if ($checkLogin) {
    // Log the action in the audit_logs table
    $action = "User Login";
    $data = json_encode(['name' => $username]);

    $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$user_id', '$action', '$data')";
    $auditResult = mysqli_query($this->$con, $auditSql);

    if($num_rows > 0) {
        while($row = mysqli_fetch_array($resultCheckLogin)) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['type_id'] = $row['type_id'];
            $_SESSION['user_type'] = $row['user_type_name'];
            return $resultCheckLogin = 1;
        }
    } else {
        return $resultCheckLogin = 0;
    }


}
    }



    // public function getUserID($user_id)
    // {
    //     $sql = "SELECT * FROM users
	// 			 WHERE user_id='$user_id'";
    //     $result = mysqli_query($this->$con, $sql);
    //     return $result;

    // }

    public function getAuditID($id)
    {
        $sql = "SELECT * FROM audit_logs
				 WHERE audit_logs.id ='$id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }


    public function closeCon()
    {
        mysqli_close($this->$con);
    }


}





	