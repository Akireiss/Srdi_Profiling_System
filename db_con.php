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
    public function getTotalProduction()
    {
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
    
    public function getFarmToolActive()
    {
        $sql = "SELECT * FROM farm_tool
				WHERE tool_status = 'Active'";
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
                LEFT JOIN education
                ON cocoon.education = education.education_id
                LEFT JOIN religion
                ON cocoon.religion = religion.religion_id
                LEFT JOIN civil
                ON cocoon.civil_status = civil.civil_id
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
                ON production.producer_id = cocoon.cocoon_id
                LEFT JOIN site
                ON cocoon.cocoon_id = site.producer_id";
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
      public function getProductionByName($name) {
         $sql = "SELECT * FROM production
        WHERE name = '$name'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
}

    public function getMonitoring()
    {
        $sql = "SELECT * FROM monitoring_team";
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
    public function getYear()
    {
        $sql = "SELECT * FROM year";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }

    public function getYearActive()
    {
        $sql = "SELECT * FROM year
        where year_status = 'Active'";
        $result = mysqli_query($this->$con, $sql);
        return $result;
    }
    public function getYearID($year_id)
    {
        $sql = "SELECT * FROM year
				 WHERE year_id='$year_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result;

    }


    public function updateEducation($user_id, $education_id, $education_name, $education_status)
    {
        $sql = "UPDATE education
				SET education_name = '$education_name',
					education_status	='$education_status'
				WHERE education_id	= '$education_id'";
        $result = mysqli_query($this->$con, $sql);
        if ($result) {
            // Log the action in the audit_logs table
            $userID = $user_id;
            $action = "Update Education: ";
            $data = json_encode([
                'education_name' => $education_name,
                'education_status' => $education_status,   
                'education_id' => $education_id
            ]);

            $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
            $auditResult = mysqli_query($this->$con, $auditSql);
            return $result = 1;
        }
    }
    public function updateReligion($user_id, $religion_id, $religion_name, $religion_status)
    {
        $sql = "UPDATE religion
				SET religion_name = '$religion_name',
					religion_status	='$religion_status'
				WHERE religion_id	= '$religion_id'";
        $result = mysqli_query($this->$con, $sql);
        if ($result) {
            // Log the action in the audit_logs table
            $userID = $user_id;
            $action = "Update Religion: ";
            $data = json_encode([
                'religion_name' => $religion_name,
                'religion_status' => $religion_status,   
                'religion_id' => $religion_id
            ]);

            $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
            $auditResult = mysqli_query($this->$con, $auditSql);
            return $result = 1;
        }
    }
    public function updateTopography($user_id, $topography_id, $topography_name, $topography_status)
    {
        $sql = "UPDATE topography
				SET topography_name = '$topography_name',
					topography_status	='$topography_status'
				WHERE topography_id	= '$topography_id'";
        $result = mysqli_query($this->$con, $sql);
        if ($result) {
            // Log the action in the audit_logs table
            $userID = $user_id;
            $action = "Update Topography: ";
            $data = json_encode([
                'topography_name' => $topography_name,
                'topography_status' => $topography_status,   
                'topography_id' => $topography_id
            ]);

            $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
            $auditResult = mysqli_query($this->$con, $auditSql);
            return $result = 1;
        }
    }
    public function updateFarmTools($user_id, $tool_id, $tool_name, $tool_status)
    {
        $sql = "UPDATE farm_tool
				SET tool_name = '$tool_name',
					tool_status	='$tool_status'
				WHERE tool_id	= '$tool_id'";
        $result = mysqli_query($this->$con, $sql);
        if ($result) {
            // Log the action in the audit_logs table
            $userID = $user_id;
            $action = "Update Farm Tools: ";
            $data = json_encode([
                'tool_name' => $tool_name,
                'tool_status' => $tool_status,   
                'tool_id' => $tool_id
            ]);

            $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
            $auditResult = mysqli_query($this->$con, $auditSql);
            return $result = 1;
        }
    }
    public function updateSource_Income($user_id, $source_id, $source_name, $source_status)
    {
        $sql = "UPDATE source_income
				SET source_name = '$source_name',
					source_status	='$source_status'
				WHERE source_id	= '$source_id'";
        $result = mysqli_query($this->$con, $sql);
        if ($result) {
            // Log the action in the audit_logs table
            $userID = $user_id;
            $action = "Update Source of Income: ";
            $data = json_encode([
                'source_name' => $source_name,
                'source_status' => $source_status,  
                'source_id' => $source_id,
            ]);

            $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
            $auditResult = mysqli_query($this->$con, $auditSql);
            return $resultsql = 1;
        }
    }
    public function updateLand($user_id, $land_id, $land_name, $land_status)
    {
        $sql = "UPDATE land
				SET land_name = '$land_name',
					land_status	='$land_status'
				WHERE land_id	= '$land_id'";
        $result = mysqli_query($this->$con, $sql);
        if ($result) {
            // Log the action in the audit_logs table
            $userID = $user_id;
            $action = "Update Land Type: ";
            $data = json_encode([
                'land_name' => $land_name,
                'land_status' => $land_status ,
                'land_id' => $land_id   
            ]);

            $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
            $auditResult = mysqli_query($this->$con, $auditSql);
            return $result = 1;
        }
    }
    public function updateTenancy($user_id, $tenancy_id, $tenancy_name, $tenancy_status)
    {
        $sql = "UPDATE tenancy
				SET tenancy_name = '$tenancy_name',
					tenancy_status	='$tenancy_status'
				WHERE tenancy_id	='$tenancy_id'";
        $result = mysqli_query($this->$con, $sql);
        if ($result) {
            // Log the action in the audit_logs table
            $userID = $user_id;
            $action = "Update Tenancy Status: ";
            $data = json_encode([
                'tenancy_name' => $tenancy_name,
                'tenancy_status' => $tenancy_status,
                'tenancy_id' => $tenancy_id   
            ]);

            $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
            $auditResult = mysqli_query($this->$con, $auditSql);
            return $result = 1;
        }
    }

    public function updateIrrigation($irrigation_id, $irrigation_name, $irrigation_status)
    {
        $sql = "UPDATE irrigation
				SET irrigation_name = '$irrigation_name',
					irrigation_status	='$irrigation_status'
				WHERE irrigation_id	='$irrigation_id'";
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
    
    public function updateProduction($production_id, $production_date,
     $total_production, $p_income, $p_cost, $n_income, $producer_id, $user_id)
    {
    $sql = "UPDATE production
                    SET production_date = '$production_date',
                        total_production = '$total_production',
                        p_income = '$p_income',
                        p_cost = '$p_cost',
                        n_income = '$n_income',
                        producer_id = '$producer_id' 
                    WHERE production_id = '$production_id'";

    $result = mysqli_query($this->$con, $sql);
    if ($sql) {
        // Log the action in the audit_logs table
        $action = "Update production: ";
        $data = json_encode([
            'producer_id' => $producer_id,
            'production_date' => $production_date,
            'total_production' => $total_production,
            'p_income' => $p_income,
            'p_cost' => $p_cost,
            'n_income' => $n_income
        ]);

        $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$user_id','$action', '$data')";
        $auditResult = mysqli_query($this->$con, $auditSql);
        return $resultsql = 1;

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
    public function updateYear($year_id, $year_name, $year_status)
    {
        $sql = "UPDATE year
            SET year_name = '$year_name',
                year_status	='$year_status'
            WHERE year_id	= '$year_id'";
        $result = mysqli_query($this->$con, $sql);
        return $result = 1;
    }


    public function addUser($user_id, $fullname, $username, $password, $type_id, $status)
    {
        $checkUser = "SELECT * FROM users
						WHERE fullname = '$fullname'";
        $resultCheckUser = mysqli_query($this->$con, $checkUser);
        $num_rows = mysqli_num_rows($resultCheckUser);
        if ($num_rows > 0) {
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
                $userID = $user_id;
                $action = "Add User: ";
                $data = json_encode([
                    'fullname' => $fullname,
                    'username' => $username,  
                    'password' => $password, 
                    'password' => $password,
                    'type_id' => $type_id,
                    'status' => $status 
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            }
            
        }
    }
    public function addUserType($user_id, $user_type, $status)
    {
        $checkUser = "SELECT * FROM user_type
						WHERE user_type_name = '$user_type'";
        $resultCheckUser = mysqli_query($this->$con, $checkUser);
        $num_rows = mysqli_num_rows($resultCheckUser);
        if ($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sqlUser = "INSERT INTO user_type (user_type_name, user_type_status)
						VALUES ('$user_type',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sqlUser);
            if ($resultsql) {
                // Log the action in the audit_logs table
                $userID = $user_id;
                $action = "Add User Type: ";
                $data = json_encode([
                    'user_type' => $user_type,
                    'status' => $status   
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            }
        }
    }
    public function addEducation($user_id, $education, $status)
    {
        $check = "SELECT * FROM education
						WHERE education_name = '$education'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO education (education_name, education_status)
						VALUES ('$education',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            if ($resultsql) {
                // Log the action in the audit_logs table
                $userID = $user_id;
                $action = "Add Education: ";
                $data = json_encode([
                    'education' => $education,
                    'status' => $status   
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            }
            return $resultsql = 1;
        }
    }
    public function addMunicipality($municipality, $status)
    {
        $check = "SELECT * FROM municipality
						WHERE municipality_name = '$municipality'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO municipality (municipality_name, municipality_status)
						VALUES ('$municipality',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
    }
    public function addSource_Income($user_id, $source_of_income, $status)
    {
        $check = "SELECT * FROM source_income
						WHERE source_name = '$source_of_income'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO source_income (source_name, source_status)
						VALUES ('$source_of_income',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            if ($resultsql) {
                // Log the action in the audit_logs table
                $userID = $user_id;
                $action = "Add Source of Income: ";
                $data = json_encode([
                    'source_of_income' => $source_of_income,
                    'status' => $status   
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            }
        }
    }
    public function addReligion($user_id, $religion, $status)
    {
        $check = "SELECT * FROM religion
						WHERE religion_name = '$religion'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO religion (religion_name, religion_status)
						VALUES ('$religion',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            if ($resultsql) {
                // Log the action in the audit_logs table
                $userID = $user_id;
                $action = "Add Religion: ";
                $data = json_encode([
                    'religion' => $religion,
                    'status' => $status   
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            }
        }
    }
    public function addTenancy($user_id, $tenancy_status, $status)
    {
        $check = "SELECT * FROM tenancy
						WHERE tenancy_name = '$tenancy_status'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO tenancy (tenancy_name, tenancy_status)
						VALUES ('$tenancy_status',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);

            if ($resultsql) {
                // Log the action in the audit_logs table
                $userID = $user_id;
                $action = "Add Tenancy Status: ";
                $data = json_encode([
                    'tenancy_status' => $tenancy_status,
                    'status' => $status   
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            }
            return $resultsql = 1;
        }
    }

    public function addFarmTools($user_id, $farm_tools, $status)
    {
        $check = "SELECT * FROM farm_tool
						WHERE tool_name = '$farm_tools'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO farm_tool (tool_name, tool_status)
						VALUES ('$farm_tools',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            if ($resultsql) {
                // Log the action in the audit_logs table
                $userID = $user_id;
                $action = "Add Farm Tools: ";
                $data = json_encode([
                    'farm_tools' => $farm_tools,
                    'status' => $status   
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            }
        }
    }
    public function addLand($user_id, $land_type, $status)
    {
        $check = "SELECT * FROM land
						WHERE land_name = '$land_type'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO land (land_name, land_status)
						VALUES ('$land_type',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            if ($resultsql) {
                // Log the action in the audit_logs table
                $userID = $user_id;
                $action = "Add Land Type: ";
                $data = json_encode([
                    'land_type' => $land_type,
                    'status' => $status   
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            }
            return $resultsql = 1;
        }
    }
    public function addTopography($user_id, $topography, $status)
    {
        $check = "SELECT * FROM topography
						WHERE topography_name = '$topography'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO topography (topography_name, topography_status)
						VALUES ('$topography',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            
            if ($resultsql) {
                // Log the action in the audit_logs table
                $userID = $user_id;
                $action = "Add Topography: ";
                $data = json_encode([
                    'topography' => $topography,
                    'status' => $status   
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            }
        }
    }
        
    

    public function addIrrigation($user_id, $source_of_irrigation, $status)
    {
        $check = "SELECT * FROM irrigation
						WHERE irrigation_name = '$source_of_irrigation'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO irrigation (irrigation_name, irrigation_status)
						VALUES ('$source_of_irrigation',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            if ($resultsql) {
                // Log the action in the audit_logs table
                $userID = $user_id;
                $action = "Add Source of Irrigation: ";
                $data = json_encode([
                    'source_of_irrigation' => $source_of_irrigation,
                    'status' => $status   
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            }
            return $resultsql = 1;
        }
    }
    public function addSoil($user_id, $soil_type, $status)
    {
        $check = "SELECT * FROM soil
						WHERE soil_name = '$soil_type'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO soil (soil_name, soil_status)
						VALUES ('$soil_type',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            if ($resultsql) {
                // Log the action in the audit_logs table
                $userID = $user_id;
                $action = "Add Soil Type: ";
                $data = json_encode([
                    'soil_type' => $soil_type,
                    'status' => $status   
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            }
        }
    }
    public function addRegion($user_id, $regDesc, $regCode)
    {
        $check = "SELECT * FROM region
						WHERE regDesc = '$regDesc' OR regCode = '$regCode'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $psgCode = $regCode . '0000000';
            $sql = "INSERT INTO region (psgcCode, regDesc, regCode)
						VALUES ('$psgCode',
								'$regDesc',					
								'$regCode')";

            $resultsql = mysqli_query($this->$con, $sql);
            if ($resultsql) {
                // Log the action in the audit_logs table
                $userID = $user_id;
                $action = "Add Region: ";
                $data = json_encode([
                    'psgCode' => $psgCode,
                    'regDesc' => $regDesc ,
                    'regCode' => $regCode   
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            }
        }
    }
    public function addProvince($user_id, $provDesc, $provCode)
    {
        $check = "SELECT * FROM province
						WHERE provDesc = '$provDesc' OR provCode = '$provCode'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $psgCode = $provCode . '0000000';
            $sql = "INSERT INTO province (psgcCode, provDesc, provCode)
						VALUES ('$psgCode',
								'$provDesc',					
								'$provCode')";

            $resultsql = mysqli_query($this->$con, $sql);
            if ($resultsql) {
                // Log the action in the audit_logs table
                $userID = $user_id;
                $action = "Add Province: ";
                $data = json_encode([
                    'psgCode' => $psgCode,
                    'provDesc' => $provDesc,  
                    'provCode' => $provCode,   
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            }
        }
    }

    public function addProducer(
        $user_id,
        $name,
        $birthdate,
        $age,
        $type,
        $sex,
        $region,
        $province,
        $municipality,
        $barangay,
        $address,
        $education,
        $religion,
        $civil_status,
        $name_spouse,
        $farm_participate,
        $cannot_participate,
        $male,
        $female,
        $source_income,
        $years_in_farming,
        $available_workers,
        $selectedFarmToolsJSON,
        $intent,
        $signature,
        $id_pic,
        $bypic,
        $date_validation
    ) {
        $check = "SELECT * FROM cocoon
						WHERE name = '$name'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
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
                $data = json_encode([
                    'name' => $name,
                    'birthdate' => $birthdate,
                    'age' => $age,
                    'type' => $type,
                    'sex' => $sex,
                    'region' => $region,
                    'province' => $province,
                    'municipality' => $municipality,
                    'barangay' => $barangay,
                    'address' => $address,
                    'education' => $education,
                    'religion' => $religion,
                    'civil_status' => $civil_status,
                    'name_spouse' => $name_spouse,
                    'farm_participate' => $farm_participate,
                    'cannot_participate' => $cannot_participate,
                    'male' => $male,
                    'female' => $female,
                    'source_income' => $source_income,
                    'years_in_farming' => $years_in_farming,
                    'available_workers' => $available_workers,
                    'selectedFarmToolsJSON' => $selectedFarmToolsJSON
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$user_id', '$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            }
        }
    }



    public function addSite(
        $user_id,
        $location,
        $producer_id,
        $topography,
        $region,
        $province,
        $municipality,
        $barangay,
        $address,
        $landJson,
        $tenancyJson,
        $area,
        $crops,
        $share,
        $irrigation,
        $water,
        $source,
        $soil,
        $market,
        $distance,
        $land_area,
        $agency,
        $charge,
        $adopters,
        $remarks,
        $names,
        $position,
        $date
    ) {
        $check = "SELECT * FROM site
						WHERE location = '$location'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
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
                $userID = $user_id;
                $action = "Added project site location: ";
                $data = json_encode([
                    'location' => $location,
                    'producer_id' => $producer_id,
                    'topography' => $topography,
                    'region' => $region,
                    'province' => $province,
                    'municipality' => $municipality,
                    'barangay' => $barangay,
                    'address' => $address,
                    'landJson' => $landJson,
                    'tenancyJson' => $tenancyJson,
                    'area' => $area,
                    'crops' => $crops,
                    'share' => $share,
                    'irrigation' => $irrigation,
                    'water' => $water,
                    'source' => $source,
                    'market' => $market,
                    'distance' => $distance,
                    'land_area' => $land_area,
                    'agency' => $agency,
                    'charge' => $charge,
                    'adopters' => $adopters,
                    'remarks' => $remarks,
                    'names' => $names,
                    'position' => $position,
                    'date' => $date,
                    'soil' => $soil
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            } 

        }
    }
    public function addProduction($user_id, $producer_id, $production_date, $total_production, $p_income, $p_cost, $n_income)
    {
        $check = "SELECT * FROM production
						WHERE production_date = '$production_date'";

        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO production (producer_id, production_date, total_production, p_income, p_cost, n_income)
						VALUES ('$producer_id',     
                                '$production_date',					
								'$total_production',
                                '$p_income',
                                '$p_cost',
                                '$n_income')";

            $resultsql = mysqli_query($this->$con, $sql);
            if ($resultsql) {
                // Log the action in the audit_logs table
                $userID = $user_id;
                $action = "Add production: ";
                $data = json_encode([
                    'producer_id' => $producer_id,
                    'production_date' => $production_date,
                    'total_production' => $total_production,
                    'p_income' => $p_income,
                    'p_cost' => $p_cost,
                    'n_income' => $n_income
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            }

        }
    }


    public function addMonitoring($user_id, $name, $position, $status)
    {
        $check = "SELECT * FROM monitoring_team
						WHERE monitoring_name = '$name'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO monitoring_team (monitoring_name, position, status)
						VALUES ('$name',
                                '$position',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            
            if ($resultsql) {
                // Log the action in the audit_logs table
                $userID = $user_id;
                $action = "Add Monitoring Team: ";
                $data = json_encode([
                    'name' => $name,
                    'status' => $status   
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            }
        }
    }
    public function addCivil($civil_status, $status)
    {
        $check = "SELECT * FROM civil
						WHERE civil_name = '$civil_status'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO civil (civil_name, status)
						VALUES ('$civil_status',					
								'$status')";
            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
    }
    public function addAgency($user_id, $funding_agency, $status)
    {
        $check = "SELECT * FROM agency WHERE agency_name = '$funding_agency'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);

        if ($num_rows > 0) {
            return $resultsql = 0; // Agency already exists
        } else {
            $sql = "INSERT INTO agency (agency_name, status) 
            VALUES ('$funding_agency', 
                    '$status')";
            $resultsql = mysqli_query($this->$con, $sql);

            if ($resultsql) {
                // Log the action in the audit_logs table
                $userID = $user_id;
                $action = "Add Funding Agency: ";
                $data = json_encode([
                    'funding_agency' => $funding_agency,
                    'status'         => $status   
                ]);

                $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$userID','$action', '$data')";
                $auditResult = mysqli_query($this->$con, $auditSql);
                return $resultsql = 1;
            }
        }
    }
    public function addYear($year, $year_status)
    {
        $check = "SELECT * FROM year
                    WHERE year_name = '$year'";
        $resultCheck = mysqli_query($this->$con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
            return $resultsql = 0;
        } else {
            $sql = "INSERT INTO year (year_name, year_status)
                    VALUES ('$year',					
                            '$year_status')";
            $resultsql = mysqli_query($this->$con, $sql);
            return $resultsql = 1;
        }
    }


    // Function to count Cocoon Producers


    //Count Total Production
    public function countTotalProduction()
    {
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
        $check = "SELECT COUNT(*) AS count FROM cocoon where status = 'Active'";
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
    public function countSeed()
    {
        $check = "SELECT COUNT(*) as count FROM cocoon
        WHERE type = 'Seed Cocoon'";
        $resultCheck = mysqli_query($this->$con, $check);
        $row = mysqli_fetch_assoc($resultCheck);
        return $row['count'];
    }
    public function countCommercial()
    {
        $check = "SELECT COUNT(*) as count FROM cocoon
        WHERE type = 'Commercial'";;
        $resultCheck = mysqli_query($this->$con, $check);
        $row = mysqli_fetch_assoc($resultCheck);
        return $row['count'];
    }



    

   public function checkLogin($username, $password)
{
    $checkLogin = "SELECT * FROM users as a
                    LEFT JOIN user_type as b
                    ON a.type_id = b.user_type_id
                    WHERE username = '$username'
                    AND password = '$password'
                    AND user_status = 'Active'";
    $resultCheckLogin = mysqli_query($this->$con, $checkLogin);
    $num_rows = mysqli_num_rows($resultCheckLogin);

    if ($num_rows > 0) {
        $row = mysqli_fetch_array($resultCheckLogin);
        $user_id = $row['user_id'];

        // Log the login action in the audit_logs table
        $action = "User Login";
        $data = json_encode(['user_id' => $user_id, 'username' => $username]);

        $auditSql = "INSERT INTO audit_logs (user_id, action, data) VALUES ('$user_id', '$action', '$data')";
        $auditResult = mysqli_query($this->$con, $auditSql);

        $_SESSION['user_id'] = $user_id;
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['type_id'] = $row['type_id'];
        $_SESSION['user_type'] = $row['user_type_name'];
        return 1;
    } else {
        return 0;
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

    ///barchart
    public function barChart() {
        $sql = "SELECT MONTH(production_date) AS month, COUNT(production_id) AS count 
        FROM production GROUP BY month";
        $result = mysqli_query($this->$con, $sql);
        $data = array_fill(1, 12, 0); // Initialize an array to store counts for each month
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $month = $row['month'];
                $count = $row['count'];
                $data[$month - 1] = $count; // Store the count in the corresponding month (adjust for zero-based array)
            }
        }
    
        return $data; // Return the data as an array
    }
    


    public function closeCon()
    {
        mysqli_close($this->$con);
    }


}





