<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 2017-12-22
 * Time: 01:10
 */

namespace App\Validators;

class CategoryValidator
{
    private $categoryList = []; //array of all category pairs

    //Check if this category-subcategory pair exist
    public function categoryExist($category)
    {
        foreach ($this->categoryList as $cat) {
            if ($category->category == $cat->category && $category->subCategory == $cat->subCategoery)
                return true;
            else
                return false;
        }
    }

}