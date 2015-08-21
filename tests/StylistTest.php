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
        protected function tearDown()
        {
            Stylist::deleteAll();
            //Client::deleteAll();
        }

        function test_getName()
        {
            //Arrange
            $name = "Diane";
            $phone = "5033440878";
            $specialty = "Hair Loss";
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
            $name = "Steph";
            $phone = "5033145678";
            $specialty = "Color";
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
            $name = "Barb";
            $phone = "5039885678";
            $specialty = "Women";
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
            $specialty = "Men";
            $weekends = true;

            $test_stylist = new Stylist($name, $phone, $specialty, $weekends);

            //Act
            $result = $test_stylist->getWeekends();

            //Assert
            $this->assertEquals($weekends, $result);
        }

        function test_save()
        {
            //Arrange
            $name = "Joann";
            $phone = "5033445678";
            $specialty = "Men";
            $weekends = true;

            $test_stylist = new Stylist($name, $phone, $specialty, $weekends);
            $test_stylist->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals($test_stylist, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $stylist1 = new Stylist(
                "Iris",
                "5033428797",
                "Children",
                false
            );
            $stylist1->save();
            $stylist2 = new Stylist(
                "Bif",
                "5033421111",
                "Beard Trimming",
                true
            );
            $stylist2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$stylist1, $stylist2], $result);
        }

        function test_updatePhone()
        {
            //Arrange
            $name = "Steven";
            $phone = "5093225678";
            $specialty = "Bleaching";
            $weekends = true;

            $test_stylist = new Stylist($name, $phone, $specialty, $weekends);
            $test_stylist->save();

            //Act
            $new_phone = "5031546887";
            $test_stylist->updatePhone($new_phone);
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals($new_phone, $result[0]->getPhone());
        }



    }
 ?>
