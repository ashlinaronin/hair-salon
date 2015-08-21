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
            $GLOBALS['DB']->exec(
                "INSERT INTO clients (name, phone, stylist_id) VALUES (
                    '{$this->getName()}',
                    '{$this->getPhone()}',
                    {$this->getStylistId()}
                );"
            );
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        //[R]ead all
        // Turn DB rows in clients table into an array of Client objects
        static function getAll()
        {
            $db_clients= $GLOBALS['DB']->query("SELECT * FROM clients;");
            $all_clients = array();

            foreach ($db_clients as $client) {
                $new_client = new Client(
                    $client['name'],
                    $client['phone'],
                    $client['stylist_id'],
                    $client['id']
                );
                array_push($all_clients, $new_client);
            }
            return $all_clients;
        }

        //[R]ead one
        static function find($search_id)
        {

        }

        //[U]pdate
        // just one update method for now
        function updatePhone($new_phone)
        {
            $GLOBALS['DB']->exec(
                "UPDATE clients SET PHONE = '{$new_phone}'
                    WHERE id = {$this->getId()};"
            );
            $this->setPhone($new_phone);
        }

        //[D]elete one
        function delete()
        {

        }

        //[D]elete all
        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }
    }
?>
