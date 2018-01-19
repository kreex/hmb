<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 2017-12-30
 * Time: 20:52
 */

namespace App\Controllers;

//Store, Add, Delete, Edit currently used transactions
use App\Entity\Transaction;
use App\Classes\BalanceCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TransactionsController extends Controller
{
    private $balance;
    private $transaction_list;

    public function __construct()
    {
        $this->balance = new BalanceCalculator();
    }
    /**
     * @Route("/getTransactions/{elements_number}", name="get_transactions")
     */
    // return last "n" transactions
    // $elements_number - number of elements to get from list
    public function getTransactions($elements_number)
    {
        $this->transaction_list = $this->getDoctrine()->getRepository("App:Transaction")->findAll();
        $transactions_reversed = array_reverse($this->transaction_list);
        $transactions_to_return = [];

        for($i = 0; $i < $elements_number; $i++) {
            array_push($transactions_to_return,
                [
                    "date" => $transactions_reversed[$i]->getDate(),
                    "description" => $transactions_reversed[$i]->getDescription(),
                    "category" => $transactions_reversed[$i]->getCategory(),
                    "subcategory" => $transactions_reversed[$i]->getSubcategory(),
                    "value" => $transactions_reversed[$i]->getValue(),
                    "income" => $transactions_reversed[$i]->getIncome()

                ]);
        }
        return new Response(json_encode($transactions_to_return)) ;

    }

    /**
     * @Route("/addTransaction", name="add_transaction")
     */
    public function addTransaction(ValidatorInterface $validator)
    {
        $em = $this->getDoctrine()->getManager();

        $transaction = new Transaction();

        $transaction->setDate($_POST["date"]);
        $transaction->setDescription($_POST["desc"]);
        $transaction->setCategory($_POST["ctg"]);
        $transaction->setSubcategory($_POST["sctg"]);
        $transaction->setValue($_POST["value"]);
        $transaction->setIncome(false);

        $errors = $validator->validate($transaction);

        if(count($errors) > 0) {
            $err = (string)$errors;
            return new Response($err);
        }
        else{
            $em->persist($transaction);
            $em->flush();

            return new Response("true");
        }

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