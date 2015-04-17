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

    //DB FUNCTIONS

    //DELETE FUNCTIONS

    //JOIN STYLIST TO CLIENTS
  }
