<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 2017-12-22
 * Time: 01:58
 */

namespace App\Classes;

//Describe single transaction
//Hold information about single transaction
class Transaction
{
    private $description;
    private $date;
    private $value;     //absolute value of transaction
    private $category;
    private $isIncome;  //describe transaction positive or negative value  true - positive(income)

    public function __construct($description, $date, $value, $category, $subCategory, $isIncome)
    {
        $this->description = $description;
        $this->date = $date;
        $this->value = $value;
        $this->category = new Category($category, $subCategory);
        $this->isIncome = $isIncome;
    }
}