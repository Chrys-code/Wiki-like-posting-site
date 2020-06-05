<?php

include("poi_reviews.php");


class reviewDAO {

    private $table, $conn;

    public function __construct($conn, $t) {
        $this->conn = $conn;
        $this->table = $t;
    }

    // Find review by poi_id
    public function findPoiByPoi_id($ID) {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE poi_id=? ");
        $stmt -> execute([$ID]);
        $row = $stmt -> fetch();
        return new review($row["poi_id"],$row["review"],$row["approved"]);
    }

    // Add new review
    public function addReview(review &$reviewObj) {
        $stmt = $this->conn->prepare("INSERT INTO ". $this->table . " (poi_id, review) VALUES (?, ?)");
        $stmt -> execute([$reviewObj->getPoi_id(), $reviewObj->getReview()]);
        $reviewObj->setId($this->conn->lastInsertId());
    }


}




?>