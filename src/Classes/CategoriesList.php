<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 2017-12-25
 * Time: 22:42
 */

namespace App\Classes;


class CategoriesList
{

    public function categoryList()
    {
        $categoryList = [
            "Inne",
            "Dom",
            "Jedzenie",
            "Zdrowie",
            "Higiena_i_kosmetyki",
            "Rozrywka",
            "Samochod",
            "Telekomunikacja",
            "Ubrania",
            "Kredyt",
            "Uzywki",
            "Komunikacja",
            "Zarobki",
        ];

        return $categoryList;
    }
    public function subCategoryList($category)
    {
        $subCategoryList = [
        "Inne"=>
            ["inne"],

            "Dom"=>
            ["woda","prad","gaz","czynsz","remonty","wyposazenie","inne"],

       "Jedzenie"=>
            ["dom","miasto","praca","inne"],

       "Zdrowie"=>
            ["lekarz","badania","lekarstwa","inne"],

       "Higiena_i_kosmetyki"=>
            ["srodki czystosci","kosmetyki","fryzjer","inne"],

       "Rozrywka"=>
            ["kino, teatr","koncert","wydarzenie","hotel","ksiazki","czasopisma","silownia, basen","karta multisport","inne"],

       "Samochod"=>
            ["paliwo","naprawy","akcesoria","ubezpieczenie","inne"],

       "Telekomunikacja"=>
            ["telefon","internet","tv","inne"],

       "Ubrania" =>
            ["zwykle","sportowe","buty","dodatki","inne"],

       "Kredyt"=>
            ["samochod","hipoteczny","raty","inne"],

       "Uzywki"=>
            ["papierosy","E-papieros","alkohol","inne"],

       "Komunikacja"=>
            ["autobusy","taxi","pociagi","inne"],

       "Zarobki"=>
            ["pensja","premia","sprzedaz","odsetki","inne"]
    ];
        if($category != "all"){
            $subCategoryList = $subCategoryList[$category];
        }
        return $subCategoryList;
    }

}