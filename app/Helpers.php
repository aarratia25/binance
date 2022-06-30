<?php

use App\Models\Transaction;

class Helpers
{
    private static $instance;

    public static function getInstance() : Helpers {

        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function activePlan($itemId)
    {
        $transaction = Transaction::where('user_id', auth()->user()->id)->first();

        if(!is_null($transaction)) {
            return $transaction->plan_id == $itemId;
        }
    }
}

function helper() : Helpers {
    return Helpers::getInstance();
}
