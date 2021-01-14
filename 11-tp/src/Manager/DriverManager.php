<?php

namespace Manager;

class DriverManager extends AbstractManager
{
    protected $table = 'driver';
    protected $columns = ['id', 'name', 'firstname'];
}
