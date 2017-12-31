<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 2017-12-30
 * Time: 20:52
 */

namespace App\Controllers;

//Store, Add, Delete, Edit currently used transactions
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransactionsController
{
    private $transaction_list = [
        ["id" => "1", "date" => "2017-12-30", "desc" => "szamka sub", "category" => "Jedzenie", "subcategory" => "miasto", "value" => 10.99, "is_income" => false],
        ["id" => "2", "date" => "2017-12-30", "desc" => "szamka sub", "category" => "Jedzenie", "subcategory" => "miasto", "value" => 10.99, "is_income" => false],
        ["id" => "3", "date" => "2017-12-30", "desc" => "szamka sub", "category" => "Jedzenie", "subcategory" => "miasto", "value" => 10.99, "is_income" => false],
        ["id" => "4", "date" => "2017-12-30", "desc" => "szamka sub", "category" => "Jedzenie", "subcategory" => "miasto", "value" => 10.99, "is_income" => false],
        ["id" => "5", "date" => "2017-12-30", "desc" => "szamka sub", "category" => "Jedzenie", "subcategory" => "miasto", "value" => 10.99, "is_income" => false],
    ];

    /**
     * @Route("/getTransactions/{elements_number}", name="get_transactions")
     */
    // return last "n" transactions
    public function getTransactions($elements_number) //number of elements to get from list
    {
        $transactions_reversed = array_reverse($this->transaction_list);
        $transactions_to_return = [];

        for($i = 0; $i < $elements_number; $i++) {
            array_push($transactions_to_return, $transactions_reversed[$i]);
        }
        return new Response(json_encode($transactions_to_return)) ;
    }

    /**
     * @Route("/addTransaction", name="add_transaction")
     */
    public function addTransaction()
    {
        return new Response("add") ;
    }

    /**
     * @Route("/deleteTransaction", name="delete_transaction")
     */
    public function deleteTransaction()
    {
        return new Response("delete") ;
    }

    /**
     * @Route("/editTransaction", name="edit_transaction")
     */
    public function editTransaction()
    {
        return new Response("edit") ;
    }
}