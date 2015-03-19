<?php
class Location {
    private $id, $branch, $phone, $street, $city, $postal, $province, $country;

    public function __construct($branch, $phone, $street, $city, $postal, $province, $country) {
        $this->branch = $branch;
        $this->phone = $phone;
        $this->street = $street;
        $this->city = $city;
        $this->postal = $postal;
        $this->province = $province;
        $this->country = $country;
    }
    
    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }
    
    public function getBranch() {
        return $this->branch;
    }

    public function setBranch($value) {
        $this->branch = $value;
    }
    
    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($value) {
        $this->phone = $value;
    }

    public function getStreet() {
        return $this->street;
    }

    public function setStreet($value) {
        $this->street = $value;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($value) {
        $this->city = $value;
    }

    public function getPostal() {
        return $this->postal;
    }

    public function setPostal($value) {
        $this->postal = $value;
    }

    public function getProvince() {
        return $this->province;
    }

    public function setProvince($value) {
        $this->province = $value;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setCountry($value) {
        $this->country = $value;
    }

}
?>