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

    /**
     * @Route("/getTransactions/", name="get_transactions")
     */
    // return last "n" transactions
    // $elements_number - number of elements to get from list
    public function getTransactions()
    {
        $transaction_list = $this->getDoctrine()->getRepository("App:Transaction")->findBy(["month"=> date("Y-m")]);
        $transactions_reversed = array_reverse($transaction_list);
        $transactions_to_return = [];

        foreach($transactions_reversed as $trn) {
            array_push($transactions_to_return,
                [
                    "id" => $trn->getId(),
                    "date" => $trn->getDate(),
                    "description" => $trn->getDescription(),
                    "category" => $trn->getCategory(),
                    "subcategory" => $trn->getSubcategory(),
                    "value" => $trn->getValue(),
                    "income" => $trn->getIncome()

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
        $transaction->setIncome();
        $transaction->setMonth(date("Y-m"));

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
     * @Route("/deleteTransaction/", name="delete_transaction")
     */
    public function deleteTransaction()
    {
        return new Response("delete transaction with id: "  . $_POST["id"]);
    }

    /**
     * @Route("/editTransaction", name="edit_transaction")
     */
    public function editTransaction()
    {
        return new Response("edit transaction with id: "  . $_POST["id"]);
    }

    /**
     * @Route("/getBalance", name="getBalance")
     */
    public function getBalance()
    {
        $balance = new BalanceCalculator();
        $transaction_list = $this->getDoctrine()->getRepository("App:Transaction")->findBy(["month"=> date("Y-m")]);
        return new Response(json_encode($balance->CalcBalance($transaction_list)));

    }
}