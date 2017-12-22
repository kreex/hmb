<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 2017-12-21
 * Time: 01:06
 */

namespace App\Controllers;


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
        $cat = new Transaction("dsds", "dsdsd", "grgr", "edvrbt", "eteddd", "reerrererere");
        return $this->render("views/home.html.twig", [
            "category" => $cat->toString()
        ]);
    }
}