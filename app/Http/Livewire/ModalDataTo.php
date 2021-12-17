<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class ModalDataTo extends Component
{
    public $state = [];
    public $account;
    public $action;

    protected $listeners = ['eventAction'];

    public function eventAction($action, Account $account )
    {
        $this->reset();
        $this->action = $action;
        if ($account) {
            $this->state = $account->toArray();
            $this->account = $account;
            if($action === 'delete'){
                $this->delete();
            }
        }
    }

    public function submit()
    {
        $this->createOrUpdate();
    }

    private function createOrUpdate()
    {
        $validatedData = Validator::make($this->state, [
                'name' => 'required',
                'email' => 'required|email',
            ])->validate();

        Account::updateOrCreate(['id' => $this->account->id],$validatedData);

        // $this->emitTo('account-list', '$refresh');
        $this->emitUp('$refresh');
        $this->emit('modalClose', '#modal-data-to');
    }

    public function delete()
    {
        $this->account->delete();
        $this->emitTo('account-list', '$refresh');
    }

    public function render()
    {
        return view('livewire.modal-data-to');
    }
}
