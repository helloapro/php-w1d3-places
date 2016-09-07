<?php

//Objects
    class Place
    {
        private $name;
        private $stayLength;
        private $visitType;
        private $picture;

//Constructor
        function __construct($cityName, $cityStayLength, $cityVisitType, $cityPicture = "/img/travel.jpg")
        {
            $this->name = $cityName;
            $this->stayLength = $cityStayLength;
            $this->visitType = $cityVisitType;
            $this->picture = $cityPicture;
        }

//Getters and Setters
        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function setStayLength($new_stayLength)
        {
            $this->stayLength = $new_stayLength;
        }

        function getStayLength()
        {
            return $this->stayLength;
        }

        function setVisitType($new_visitType)
        {
            $this->visitType = $new_visitType;
        }

        function getVisitType()
        {
            return $this->visitType;
        }

        function setPicture($new_picture)
        {
            $this->picture = $new_picture;
        }

        function getPicture()
        {
            return $this->picture;
        }
        function save()
        {
            array_push($_SESSION['list_of_places'], $this);
        }
        static function getAll()
        {
            return $_SESSION['list_of_places'];
        }
        static function deleteAll()
        {
            $_SESSION['list_of_places'] = array();
        }

    }

?>
