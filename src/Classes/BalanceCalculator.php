<?php
/**
 * Created by PhpStorm.
 * User: Karol
 * Date: 2018-01-12
 * Time: 19:19
 */

namespace App\Classes;


class BalanceCalculator
{

    public function CalcBalance($transactions)
    {
        $balance = [
          "income" => 0,
          "outcome" => 0,
          "balance" => 0
        ];
        foreach ($transactions as $transaction) {
            if($transaction->getIncome())
                $balance["income"] += $transaction->getValue();
            else
                $balance["outcome"] += $transaction->getValue();
        }

        $balance["balance"] = $balance["income"] - $balance["outcome"];

        return $balance;
    }
}