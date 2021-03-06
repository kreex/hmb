<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 2017-12-21
 * Time: 01:06
 */

namespace App\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends Controller
{
    /**
     * @Route("/home", name="start")
     */
    /*
     * Render main page
     */
    public function start()
    {
        return $this->render("views/home.html.twig", [
            "date" => date("Y-m-d"),

        ]);
    }

    /**
     * @Route("test", name="test")
     */
    public function test()
    {
        $tests = $this->getDoctrine()->getRepository("App:Transaction")->findAll();
        //$tests = date("Y-m");
        return $this->render("views/test.html.twig", [
            "t" => $tests
        ]);
    }
}