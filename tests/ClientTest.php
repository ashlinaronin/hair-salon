<?php
    /**
    * @backupGlobals disabled
    * @backupStatic Attributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost:3306;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }

        function test_getName()
        {
            //Arrange
            $client_name = "Bill Withers";
            $client_phone = "5415134876";
            $stylist = new Stylist("Diane", "5035528959", "MPB", false);
            $stylist->save();
            $client = new Client($client_name, $client_phone, $stylist->getId());

            //Act
            $result = $client->getName();

            //Assert
            $this->assertEquals($client_name, $result);
        }

        function test_getPhone()
        {
            //Arrange
            $client_name = "Bill Withers";
            $client_phone = "5415134876";
            $stylist = new Stylist("Diane", "5035528959", "MPB", false);
            $stylist->save();
            $client = new Client($client_name, $client_phone, $stylist->getId());

            //Act
            $result = $client->getPhone();

            //Assert
            $this->assertEquals($client_phone, $result);
        }

        function test_getStylistId()
        {
            //Arrange
            $client_name = "Bill Withers";
            $client_phone = "5415134876";
            $stylist = new Stylist("Diane", "5035528959", "MPB", false);
            $stylist->save();
            $client = new Client($client_name, $client_phone, $stylist->getId());

            //Act
            $result = $client->getStylistId();

            //Assert
            $this->assertEquals($stylist->getId(), $result);
        }

        function test_save()
        {
            //Arrange
            $client_name = "Bill Withers";
            $client_phone = "5415134876";
            $stylist = new Stylist("Diane", "5035528959", "MPB", false);
            $stylist->save();
            $client = new Client($client_name, $client_phone, $stylist->getId());
            $client->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals($client, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $stylist = new Stylist("Diane", "5035528959", "MPB", false);
            $stylist->save();

            $client1 = new Client("Steven", "5412232442", $stylist->getId());
            $client1->save();
            $client2 = new Client("Matthew", "5097869876", $stylist->getId());
            $client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$client1, $client2], $result);
        }

        function test_updatePhone()
        {
            //Arrange
            $stylist = new Stylist("Diane", "5035528959", "MPB", false);
            $stylist->save();

            $client1 = new Client("Steven", "5412232442", $stylist->getId());
            $client1->save();
            $new_phone = "5029999999";
            $client1->updatePhone($new_phone);


            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals($new_phone, $result[0]->getPhone());
        }



    }
 ?>
