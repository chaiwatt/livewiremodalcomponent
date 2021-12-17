<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Traits\QueryTrait;

class AccountListOtherPage extends Component
{
    use QueryTrait;

    protected $listeners = ['$refresh'];

    public function render()
    {
        $accounts = $this->getAccouts();
        return view('livewire.account-list-other-page',[
            'accounts' =>  $accounts
        ]);
    }
}
