<?php

class pointofinterest
{
    // Attributes
    private $name;
    private $type;
    private $region;
    private $description;
    private $username;

    // methods
    function __construct($nameIn,$typeIn,$regionIn,$descriptionIn,$usernameIn)
    {
        $this->name=$nameIn;
        $this->type=$typeIn;
        $this->region=$regionIn;
        $this->description=$descriptionIn;
        $this->username=$usernameIn;
    }

    public function getName() {
        return $this->name;
    }

    public function getType() {
        return $this->type;
    }

    public function getRegion() {
        return $this->region;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getUsername() {
        return $this->username;
    }


    public function setId($id) {
        $this->id = $id;
    }

    function display() {
        echo "Name " . $this->name . " Type: " . $this->type. "<br />";
        echo "Region " . $this->region . " Description: " . $this->description. "<br />";
    }

};

//$pointofinterest = new pointofinterest( $_POST['name'] , $_POST['type'], $_POST['region'] , $_POST['description'] , $_POST['username']);
//$pointofinterest ->display();


?>