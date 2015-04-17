<?php

  /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class StylistTest extends PHPUnit_Framework_TestCase
    {
      protected function tearDown()
      {
        Stylist::deleteAll();
      }

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

      function test_getId()
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

      function test_setId()
      {
        //Arrange
        $stylist_name = "Susanna";
        $id = null;
        $test_stylist = new Stylist ($stylist_name, $id);

        //Act
        $test_stylist->setId(2);
        $result = $test_stylist->getId();

        //Assert
        $this->assertEquals(2, $result);
      }

      function testSave()
      {
        //Arrange
        $stylist_name = "Susanna";
        $id = null;
        $test_stylist = new Stylist ($stylist_name, $id);

        //Act
        $test_stylist->save();
        $result = Stylist::getAll();

        //Assert
        $this->assertEquals([$test_stylist], $result);
      }

      function testGetAll()
      {
        //Arrange
        $stylist_name = "Susanna";
        $id = null;
        $test_stylist = new Stylist ($stylist_name, $id);

        $stylist_name2 = "Randy";
        $id = null;
        $test_stylist2 = new Stylist ($stylist_name2, $id);

        //Act
        $test_stylist->save();
        $test_stylist2->save();
        $result = Stylist::getAll();

        //Assert
        $this->assertEquals([$test_stylist, $test_stylist2], $result);
      }

      function testUpdateStylist()
      {
        //Arrange
        $stylist_name = "Susanna";
        $id = null;
        $test_stylist = new Stylist ($stylist_name, $id);

        $test_stylist->save();
        $new_stylist_name = "Randy";

        //Act
        $test_stylist->updateStylist($new_stylist_name);

        $result = Stylist::getAll();

        //Assert
        $this->assertEquals($test_stylist->getStylistName(), $new_stylist_name);
      }

      function testFind()
      {
        //Arrange
        $stylist_name = "Susanna";
        $id = null;
        $test_stylist = new Stylist ($stylist_name, $id);
        $test_stylist->save();

        $stylist_name2 = "Randy";
        $id2 = null;
        $test_stylist2 = new Stylist ($stylist_name2, $id2);
        $test_stylist2->save();

        //Act
        $result = Stylist::find($test_stylist->getId());

        //Assert
        $this->assertEquals($test_stylist, $result);
      }

      function testDeleteStylist()
      {
        //Arrange
        $stylist_name = "Susanna";
        $id = null;
        $test_stylist = new Stylist ($stylist_name, $id);
        $test_stylist->save();

        $stylist_name2 = "Randy";
        $id2 = null;
        $test_stylist2 = new Stylist ($stylist_name2, $id2);
        $test_stylist2->save();

        //Act
        $test_stylist2->deleteStylist();
        $result = Stylist::getAll();

        //Assert
        $this->assertEquals([$test_stylist], $result);
      }
    }








?>
