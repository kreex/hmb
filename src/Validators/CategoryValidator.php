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
    private $categoryList = []; //array of all categories
    private $subcategory_list = []; //array of all subcategories

    private $errors = [];
    //Check if this category-subcategory are valid
    public function categoryExist($category, $subcategory)
    {
        foreach ($this->categoryList as $ctg) {
            if ($category === $ctg)
            {
                foreach ($this->subcategory_list[$category] as $sctg){
                    if($subcategory === $sctg)
                        return true;
                    else{
                        array_push($this->errors,"subcategory dose not exist");
                        return false;
                    }

                }
            }
            else
                array_push($this->errors,"category does not exist");
                return false;
        }
    }

    public function showErrors()
    {
        return $this->errors;
    }

}