<?php

include("pointofinterest.php");


class pointofinterestDAO {

    private $table, $conn;

    public function __construct($conn, $t) {
        $this->conn = $conn;
        $this->table = $t;
    }

    // Find POI by region
    public function findPoiByRegion($region) {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE region=? ");
        $stmt -> execute([$region]);
        $row = $stmt -> fetch();
        return new pointofinterest($row["name"],$row["type"],$row["region"],$row["description"]);
    }

    // Add new POI
    public function addPointofinterest(pointofinterest &$pointofinterestObj) {
        $stmt = $this->conn->prepare("INSERT INTO ". $this->table . " (name, type, region, description, username) VALUES (?, ?, ?, ?, ?)");
        $stmt -> execute([$pointofinterestObj->getName(), $pointofinterestObj->getType(),
                          $pointofinterestObj->getRegion(), $pointofinterestObj->getDescription(),
                          $pointofinterestObj->getUsername()]);
        $pointofinterestObj->setId($this->conn->lastInsertId());
    }


}




?>