<?php

class review
{
    // Attributes
    private $poi_id;
    private $review;
    private $approved;

    // methods
    function __construct($poi_idIn,$reviewIn)
    {
        $this->poi_id=$poi_idIn;
        $this->review=$reviewIn;
        $this->approved = 0;
    }

    public function getPoi_id() {
        return $this->poi_id;
    }

    public function getReview() {
        return $this->review;
    }

    public function getApproved() {
        return $this->approved;
    }

    public function setId($id) {
        $this->id = $id;
    }

    function display() {
        echo "poi id " . $this->poi_id . " review " . $this->review. "<br />";
    }

};

//$review = new review( $_POST['ID'] , $_POST['review']);
//$review ->display();


?>