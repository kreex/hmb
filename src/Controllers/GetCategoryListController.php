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
     * @Route("/categoryLists/{list_name}/{cat}/" ,name="category_lists")
     */
    public function getCategoryLists($list_name, $cat)
    {
        $list = new CategoriesList();
        switch ($list_name){

            // Return category list

            case "main": return new Response(json_encode($list->categoryList()));  break;

            //Return subcategory list

            case "all_sub": return new Response(json_encode($list->subCategoryList($cat))); break;

            //Return subcategory list for specific main category

            case "spec":return new Response(json_encode($list->subcategoryList($cat))); break;
            default : return new Response("Nie wybrano żadnej kategori"); break;
        }
    }


}