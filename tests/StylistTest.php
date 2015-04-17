<?php

  /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    // $DB = new PDO('pgsql:host=localhost;dbname=shoes_test');

    class StylistTest extends PHPUnit_Framework_TestCase
    {
      function test_getStylistName()
      {
        //Arrange
        $stylist_name = "Susanna";
        $id = 1;
        $test_stylist_name = new Stylist ($stylist_name, $id);

        //Act
        $result = $test_stylist_name->getStylistName();

        //Assert
        $this->assertEquals($stylist_name, $result);
      }

      function test_getStylistId()
      {
        //Arrange
        $stylist_name = "Susanna";
        $id = 1;
        $test_stylist_name = new Stylist ($stylist_name, $id);

        //Act
        $result = $test_stylist_name->getId();

        //Assert
        $this->assertEquals($id, $result);
      }
    }
