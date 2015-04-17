<?php

  class Stylist {
    private $stylist_name;
    private $id;

    function __construct($stylist_name, $id = null)
    {
      $this->stylist_name = $stylist_name;
      $this->id = $id;
    }

    //GETTERS
    function getStylistName()
    {
      return $this->stylist_name;
    }

    function getId()
    {
      return $this->id;
    }

    //SETTERS
    function setId($new_id)
    {
      $this->id = (int) $new_id;
    }

    function setStylistName($new_stylist_name)
    {
      $this->stylist_name = (string) $new_stylist_name;
    }

    //DB FUNCTIONS
    function save(){
      $statement = $GLOBALS['DB']->query("INSERT INTO stylists (stylist_name) VALUES ('{$this->getStylistName()}') RETURNING id;");
      $result = $statement->fetch(PDO::FETCH_ASSOC);
      $this->setId($result['id']);
    }

    static function getAll(){
      $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists");
      $stylists = array();

      foreach ($returned_stylists as $stylist) {
        $stylist_name = $stylist ["stylist_name"];
        $id = $stylist ["id"];
        $new_stylist_name = new Stylist ($stylist_name, $id);
        array_push($stylists, $new_stylist_name);
      }
      return $stylists;
    }

    //DELETE FUNCTIONS
    static function deleteAll(){
      $GLOBALS['DB']->exec("DELETE FROM stylists *;");
    }

    //JOIN STYLIST TO CLIENTS
  }
