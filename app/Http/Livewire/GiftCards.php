<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\GiftCard;

class GiftCards extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Monto, $clientes_id, $CODE, $Porcentual, $reclaimed_at;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.GiftCards.view', [
            'giftCards' => GiftCard::latest()
						->orWhere('Monto', 'LIKE', $keyWord)
						->orWhere('clientes_id', 'LIKE', $keyWord)
						->orWhere('CODE', 'LIKE', $keyWord)
						->orWhere('Porcentual', 'LIKE', $keyWord)
						->orWhere('reclaimed_at', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->Monto = null;
		$this->clientes_id = null;
		$this->CODE = null;
		$this->Porcentual = null;
		$this->reclaimed_at = null;
    }

    public function store()
    {
        $this->validate([
		'Monto' => 'required',
		'CODE' => 'required',
		'Porcentual' => 'required',
        ]);

        GiftCard::create([ 
			'Monto' => $this-> Monto,
			'clientes_id' => $this-> clientes_id,
			'CODE' => $this-> CODE,
			'Porcentual' => $this-> Porcentual,
			'reclaimed_at' => $this-> reclaimed_at
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'GiftCard Successfully created.');
    }

    public function edit($id)
    {
        $record = GiftCard::findOrFail($id);

        $this->selected_id = $id; 
		$this->Monto = $record-> Monto;
		$this->clientes_id = $record-> clientes_id;
		$this->CODE = $record-> CODE;
		$this->Porcentual = $record-> Porcentual;
		$this->reclaimed_at = $record-> reclaimed_at;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'Monto' => 'required',
		'CODE' => 'required',
		'Porcentual' => 'required',
        ]);

        if ($this->selected_id) {
			$record = GiftCard::find($this->selected_id);
            $record->update([ 
			'Monto' => $this-> Monto,
			'clientes_id' => $this-> clientes_id,
			'CODE' => $this-> CODE,
			'Porcentual' => $this-> Porcentual,
			'reclaimed_at' => $this-> reclaimed_at
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'GiftCard Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = GiftCard::where('id', $id);
            $record->delete();
        }
    }
}
