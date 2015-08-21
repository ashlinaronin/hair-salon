<?php
    class Client
    {
        private $name;
        private $phone;
        private $stylist_id;
        private $id;

        function __construct ($name, $phone, $stylist_id, $id = null)
        {
            $this->name = (string) $name;
            $this->phone = (string) $phone;
            $this->stylist_id = $stylist_id;
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

        function getStylistId()
        {
            return $this->stylist_id;
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
        /* I think ultimately we will be using SQL queries to access one
         * item in the database. However, for now, because of the way the
         * PDO object works, it is easier to turn the whole database into
         * objects of the desired class first and then search them in PHP. */
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
