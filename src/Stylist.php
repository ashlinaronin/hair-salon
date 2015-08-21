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
            $GLOBALS['DB']->exec(
                "INSERT INTO stylists (name, phone, specialty, weekends) VALUES (
                    '{$this->getName()}',
                    '{$this->getPhone()}',
                    '{$this->getSpecialty()}',
                    {$this->getWeekends()}
                );"
            );
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        //[R]ead all
        static function getAll()
        {
            $db_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            $all_stylists = array();

            /* $db_stylists is a PDO object with property query_string.
             * To actually get the data from the query we can iterate over
             * the PDO object which magically returns db rows. */
            foreach ($db_stylists as $stylist) {
                $new_stylist = new Stylist(
                    $stylist['name'],
                    $stylist['phone'],
                    $stylist['specialty'],
                    $stylist['weekends'],
                    $stylist['id']
                );
                array_push($all_stylists, $new_stylist);
            }
            return $all_stylists;
        }

        //[R]ead one
        /* I think ultimately we will be using SQL queries to access one
         * item in the database. However, for now, because of the way the
         * PDO object works, it is easier to turn the whole database into
         * objects of the desired class first and then search them in PHP. */
        static function find($search_id)
        {
            $found_stylist = null;
            $all_stylists = Stylist::getAll();
            foreach($all_stylists as $stylist) {
                if ($stylist->getId() == $search_id) {
                    $found_stylist = $stylist;
                }
            }
            return $found_stylist;
        }

        //[R]ead
        function getClients()
        {
            $matching_clients = array();
            $db_clients = $GLOBALS['DB']->query(
                "SELECT * FROM clients WHERE stylist_id = {$this->getId()};"
            );

            foreach ($db_clients as $client) {
                $new_client = new Client(
                    $client['name'],
                    $client['phone'],
                    $client['stylist_id'],
                    $client['id']
                );
                array_push($matching_clients, $new_client);
            }
            return $matching_clients;
        }

        //[U]pdate
        // just one update method for now
        function updatePhone($new_phone)
        {
            $GLOBALS['DB']->exec(
                "UPDATE stylists SET phone = '{$new_phone}'
                    WHERE id = {$this->getId()};"
            );
            $this->setPhone($new_phone);
        }

        //[D]elete one
        function delete()
        {
            $GLOBALS['DB']->exec(
                "DELETE FROM stylists WHERE id = {$this->getId()};"
            );
        }

        //[D]elete all
        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }
    }
?>
