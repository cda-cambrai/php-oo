<?php

namespace Animal;

class Cat
{
    private $name;
    private $color;
    private $type;

    public function __construct($name, $color, $type)
    {
        $this->name = $name;
        $this->color = $color;
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Cat
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     * @return Cat
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Cat
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
}

$cat = new Cat('Bianca', 'blanc', 'gouttière');
