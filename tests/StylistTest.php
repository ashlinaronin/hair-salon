<?php
    /**
    * @backupGlobals disabled
    * @backupStatic Attributes disabled
    */

    require_once "src/Stylist.php";
    //require_once "src/Client.php";

    $server = 'mysql:host=localhost:3306;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Stylist::deleteAll();
        //     //Client::deleteAll();
        // }

        function test_getName()
        {
            //Arrange
            $name = "Joann";
            $phone = "5033445678";
            $specialty = "Men\'s Cuts";
            $weekends = true;

            $test_stylist = new Stylist($name, $phone, $specialty, $weekends);

            //Act
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_getPhone()
        {
            //Arrange
            $name = "Joann";
            $phone = "5033445678";
            $specialty = "Men\'s Cuts";
            $weekends = true;

            $test_stylist = new Stylist($name, $phone, $specialty, $weekends);

            //Act
            $result = $test_stylist->getPhone();

            //Assert
            $this->assertEquals($phone, $result);
        }

        function test_getSpeciality()
        {
            //Arrange
            $name = "Joann";
            $phone = "5033445678";
            $specialty = "Men\'s Cuts";
            $weekends = true;

            $test_stylist = new Stylist($name, $phone, $specialty, $weekends);

            //Act
            $result = $test_stylist->getSpecialty();

            //Assert
            $this->assertEquals($specialty, $result);
        }

        function test_getWeekends()
        {
            //Arrange
            $name = "Joann";
            $phone = "5033445678";
            $specialty = "Men\'s Cuts";
            $weekends = true;

            $test_stylist = new Stylist($name, $phone, $specialty, $weekends);

            //Act
            $result = $test_stylist->getWeekends();

            //Assert
            $this->assertEquals($weekends, $result);
        }



    }
 ?>
