<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 2017-12-26
 * Time: 16:35
 */

namespace App\Controllers;


use App\Classes\CategoriesList;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class GetCategoryListController extends Controller
{
    /**
     * @Route("/categoryList" name="category_list")
     */
    public function getCategoryList()
    {
        $list = new CategoriesList();
        return new Response(json_encode($list->categoryList()));
    }

    /**
     * @Route("/subcategoryList" name="sub_category_list")
     */
    public function getSubCategoryList()
    {
        $list = new CategoriesList();
        return new Response(json_encode($list->subCategoryList()));
    }
}