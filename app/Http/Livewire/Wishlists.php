<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Wishlist;

class Wishlists extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Nombre, $cliente_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.wishlists.view', [
            'wishlists' => Wishlist::latest()
						->orWhere('Nombre', 'LIKE', $keyWord)
						->orWhere('cliente_id', 'LIKE', $keyWord)
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
		$this->Nombre = null;
		$this->cliente_id = null;
    }

    public function store()
    {
        $this->validate([
		'Nombre' => 'required',
		'cliente_id' => 'required',
        ]);

        Wishlist::create([ 
			'Nombre' => $this-> Nombre,
			'cliente_id' => $this-> cliente_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Wishlist Successfully created.');
    }

    public function edit($id)
    {
        $record = Wishlist::findOrFail($id);

        $this->selected_id = $id; 
		$this->Nombre = $record-> Nombre;
		$this->cliente_id = $record-> cliente_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'Nombre' => 'required',
		'cliente_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Wishlist::find($this->selected_id);
            $record->update([ 
			'Nombre' => $this-> Nombre,
			'cliente_id' => $this-> cliente_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Wishlist Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Wishlist::where('id', $id);
            $record->delete();
        }
    }
}
