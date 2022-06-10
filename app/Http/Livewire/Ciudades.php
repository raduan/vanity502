<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ciudade;

class Ciudades extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Nombre;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.ciudades.view', [
            'ciudades' => Ciudade::latest()
						->orWhere('Nombre', 'LIKE', $keyWord)
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
    }

    public function store()
    {
        $this->validate([
		'Nombre' => 'required',
        ]);

        Ciudade::create([ 
			'Nombre' => $this-> Nombre
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Ciudade Successfully created.');
    }

    public function edit($id)
    {
        $record = Ciudade::findOrFail($id);

        $this->selected_id = $id; 
		$this->Nombre = $record-> Nombre;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'Nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Ciudade::find($this->selected_id);
            $record->update([ 
			'Nombre' => $this-> Nombre
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Ciudade Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Ciudade::where('id', $id);
            $record->delete();
        }
    }
}
