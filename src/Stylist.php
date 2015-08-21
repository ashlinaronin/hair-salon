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
            $this->id = $id;
        }

        //Getters and setters
        function getName()
        {

        }

        function getPhone()
        {

        }

        function setPhone($new_phone)
        {

        }

        function getSpecialty()
        {

        }

        function setSpecialty($new_specialty)
        {

        }

        function getWeekends()
        {

        }

        function setWeekends($new_weekends)
        {

        }

        function getId()
        {

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
