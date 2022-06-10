<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Wishlistdetail;

class Wishlistdetails extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $cliente_id, $producto_id, $wishlist_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.wishlistdetails.view', [
            'wishlistdetails' => Wishlistdetail::latest()
						->orWhere('cliente_id', 'LIKE', $keyWord)
						->orWhere('producto_id', 'LIKE', $keyWord)
						->orWhere('wishlist_id', 'LIKE', $keyWord)
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
		$this->cliente_id = null;
		$this->producto_id = null;
		$this->wishlist_id = null;
    }

    public function store()
    {
        $this->validate([
		'cliente_id' => 'required',
		'producto_id' => 'required',
		'wishlist_id' => 'required',
        ]);

        Wishlistdetail::create([ 
			'cliente_id' => $this-> cliente_id,
			'producto_id' => $this-> producto_id,
			'wishlist_id' => $this-> wishlist_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Wishlistdetail Successfully created.');
    }

    public function edit($id)
    {
        $record = Wishlistdetail::findOrFail($id);

        $this->selected_id = $id; 
		$this->cliente_id = $record-> cliente_id;
		$this->producto_id = $record-> producto_id;
		$this->wishlist_id = $record-> wishlist_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'cliente_id' => 'required',
		'producto_id' => 'required',
		'wishlist_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Wishlistdetail::find($this->selected_id);
            $record->update([ 
			'cliente_id' => $this-> cliente_id,
			'producto_id' => $this-> producto_id,
			'wishlist_id' => $this-> wishlist_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Wishlistdetail Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Wishlistdetail::where('id', $id);
            $record->delete();
        }
    }
}
