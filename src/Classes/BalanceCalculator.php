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
            if($transaction["is_income"])
                $balance["income"] += $transaction["value"];
            else
                $balance["outcome"] += $transaction["value"];
        }

        $balance["balance"] = $balance["income"] - $balance["outcome"];

        return $balance["balance"];
    }
}