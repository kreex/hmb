<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 2017-12-21
 * Time: 01:06
 */

namespace App\Controllers;


use App\Classes\CategoriesList;
use App\Classes\Category;
use App\Classes\Transaction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends Controller
{
    /**
     * @Route("/start/" name="start")
     */

    public function start()
    {
        return $this->render("views/home.html.twig", [
            "date" => date("Y-m-d"),

        ]);
    }
}