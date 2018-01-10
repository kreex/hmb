<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 2017-12-22
 * Time: 01:46
 */

namespace App\Classes;

// Describe single pair off category - subcategory
class Category
{
    private $category;
    private $subCategory;

    public function __construct($subCategory, $category)
    {
        $this->category = $category;
        $this->subCategory = $subCategory;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return mixed
     */
    public function getSubCategory()
    {
        return $this->subCategory;
    }

}