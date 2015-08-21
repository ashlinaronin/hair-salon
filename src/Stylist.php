<?php
    class Stylist
    {
        private $name;
        private $phone;
        private $specialty;
        private $weekends;
        private $id;

        function __construct ($name, $phone, $specialty, $weekends, $id = null)
        {
            $this->name = (string) $name;
            $this->phone = (string) $phone;
            $this->specialty = (string) $specialty;
            $this->weekends = (int) $weekends;
            $this->id = $id;
        }

        //Getters and setters
        function getName()
        {
            return $this->name;
        }

        function getPhone()
        {
            return $this->phone;
        }

        function setPhone($new_phone)
        {
            $this->phone = (string) $new_phone;
        }

        function getSpecialty()
        {
            return $this->specialty;
        }

        function setSpecialty($new_specialty)
        {
            $this->specialty = (string) $new_specialty;
        }

        function getWeekends()
        {
            return $this->weekends;
        }

        function setWeekends($new_weekends)
        {
            $this->weekends = (int) $new_weekends;
        }

        function getId()
        {
            return $this->id;
        }

        //Database storage methods
        //[C]reate
        function save()
        {

        }

        //[R]ead all
        static function getAll()
        {

        }

        //[R]ead one
        static function find($search_id)
        {

        }

        //[U]pdate
        // just one update method for now
        function updatePhone($new_phone)
        {

        }

        //[D]elete one
        function delete()
        {

        }

        //[D]elete all
        static function deleteAll()
        {

        }
    }
?>
