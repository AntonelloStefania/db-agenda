<?php

class Obligation
{
    public $id;
    public $name;
    public $reg_date;
    public $description;
    public $start;
    public $end;
    public function __construct($name, $description, $start, $end)
    {

        $this->name = $name;

        $this->description = $description;
        $this->start = $start;
        $this->end = $end;

    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getRegDate()
    {
        return $this->reg_date;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getStart()
    {
        return $this->start;
    }
    public function getEnd()
    {
        return $this->end;
    }



}