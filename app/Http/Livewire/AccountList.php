<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Livewire\Component;
use App\Http\Traits\QueryTrait;

class AccountList extends Component
{
    use QueryTrait;

    protected $listeners = ['$refresh'];

    public function render()
    {
        $accounts = $this->getAccouts();

        return view('livewire.account-list',[
            'accounts' =>  $accounts
        ]);
    }
}
