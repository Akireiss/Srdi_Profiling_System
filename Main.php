<?php

error_reporting(0);
ini_set('display_errors', 1);
session_start();
class main
{
    public $con;
    public function __construct()
    {
        $this->con = mysqli_connect('localhost', 'root', '', 'profiling_system') or die(mysqli_error());
    }

    public function getProducersActive()
    {
        $sql = "SELECT * FROM cocoon
				WHERE status = 'Active'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function addProduction(
        $producer_id,
        $production_date,
        $total_production,
        $p_income,
        $p_cost,
        $n_income,
        $location_id
    ) {

        $stmt = $this->con->prepare("INSERT INTO production 
        (producer_id, production_date, total_production, p_income, p_cost, n_income, location_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "ssssiii",
            $producer_id,
            $production_date,
            $total_production,
            $p_income,
            $p_cost,
            $n_income,
            $location_id
        );

        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }


    public function getProductionID($production_id)
    {
        $sql = "SELECT * FROM production
            LEFT JOIN cocoon 
            ON production.producer_id = cocoon.cocoon_id
            LEFT JOIN site
            ON production.location_id = site.site_id
            WHERE production_id ='$production_id'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function updateProduction(
        $production_date,
        $total_production,
        $p_income,
        $p_cost,
        $n_income,
        $producer_id,
        $site_id,
        $productionId
        ) {
        $stmt = $this->con->prepare("UPDATE production SET production_date = ?, 
            total_production = ?, p_income = ?, p_cost = ?, n_income = ?, producer_id = ?,
            location_id = ?  WHERE production_id = ?");

        $stmt->bind_param(
            "ssssiiii",
            $production_date,
            $total_production,
            $p_income,
            $p_cost,
            $n_income,
            $producer_id,
            $site_id,
            $productionId
        );


        $result = $stmt->execute();
        $stmt->close();

        return $result ? 1 : 0;
    }

    public function getFirstProductionSite($production_id)
    {
        $stmt = $this->con->prepare("SELECT site_id, location FROM production
                                    LEFT JOIN site ON production.site_id = site.site_id
                                    WHERE production_id = ? 
                                    ORDER BY production_date ASC
                                    LIMIT 1");

        $stmt->bind_param("i", $production_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    }


    public function getProducersSite($producerId)
    {
        $sql = "SELECT * FROM site
                WHERE status = 'Active'
                AND producer_id = '$producerId'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
    public function updateSiteStatus($siteId)
    {
        $sql = "UPDATE site SET status = 'Inactive' WHERE site_id = '$siteId'";
        mysqli_query($this->con, $sql);
    }

}
