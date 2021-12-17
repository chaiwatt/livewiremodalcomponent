<?php
namespace App\Http\Traits;

use App\Models\Account;

trait QueryTrait {

    public function getAccouts(){
        $accounts = Account::get();
        return $accounts;
    }
    
}