<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cliente;

class Clientes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Nombres, $Apellidos, $Genero, $Direccion, $Telefono, $email, $FechaNacimiento, $ciudades_id, $DPI, $user_id, $Avatar, $IsAdmin;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.clientes.view', [
            'clientes' => Cliente::latest()
						->orWhere('Nombres', 'LIKE', $keyWord)
						->orWhere('Apellidos', 'LIKE', $keyWord)
						->orWhere('Genero', 'LIKE', $keyWord)
						->orWhere('Direccion', 'LIKE', $keyWord)
						->orWhere('Telefono', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('FechaNacimiento', 'LIKE', $keyWord)
						->orWhere('ciudades_id', 'LIKE', $keyWord)
						->orWhere('DPI', 'LIKE', $keyWord)
						->orWhere('user_id', 'LIKE', $keyWord)
						->orWhere('Avatar', 'LIKE', $keyWord)
						->orWhere('IsAdmin', 'LIKE', $keyWord)
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
		$this->Nombres = null;
		$this->Apellidos = null;
		$this->Genero = null;
		$this->Direccion = null;
		$this->Telefono = null;
		$this->email = null;
		$this->FechaNacimiento = null;
		$this->ciudades_id = null;
		$this->DPI = null;
		$this->user_id = null;
		$this->Avatar = null;
		$this->IsAdmin = null;
    }

    public function store()
    {
        $this->validate([
		'Nombres' => 'required',
		'Apellidos' => 'required',
		'Genero' => 'required',
		'Direccion' => 'required',
		'Telefono' => 'required',
		'email' => 'required',
		'ciudades_id' => 'required',
		'DPI' => 'required',
		'user_id' => 'required',
		'IsAdmin' => 'required',
        ]);

        Cliente::create([ 
			'Nombres' => $this-> Nombres,
			'Apellidos' => $this-> Apellidos,
			'Genero' => $this-> Genero,
			'Direccion' => $this-> Direccion,
			'Telefono' => $this-> Telefono,
			'email' => $this-> email,
			'FechaNacimiento' => $this-> FechaNacimiento,
			'ciudades_id' => $this-> ciudades_id,
			'DPI' => $this-> DPI,
			'user_id' => $this-> user_id,
			'Avatar' => $this-> Avatar,
			'IsAdmin' => $this-> IsAdmin
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Cliente Successfully created.');
    }

    public function edit($id)
    {
        $record = Cliente::findOrFail($id);

        $this->selected_id = $id; 
		$this->Nombres = $record-> Nombres;
		$this->Apellidos = $record-> Apellidos;
		$this->Genero = $record-> Genero;
		$this->Direccion = $record-> Direccion;
		$this->Telefono = $record-> Telefono;
		$this->email = $record-> email;
		$this->FechaNacimiento = $record-> FechaNacimiento;
		$this->ciudades_id = $record-> ciudades_id;
		$this->DPI = $record-> DPI;
		$this->user_id = $record-> user_id;
		$this->Avatar = $record-> Avatar;
		$this->IsAdmin = $record-> IsAdmin;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'Nombres' => 'required',
		'Apellidos' => 'required',
		'Genero' => 'required',
		'Direccion' => 'required',
		'Telefono' => 'required',
		'email' => 'required',
		'ciudades_id' => 'required',
		'DPI' => 'required',
		'user_id' => 'required',
		'IsAdmin' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Cliente::find($this->selected_id);
            $record->update([ 
			'Nombres' => $this-> Nombres,
			'Apellidos' => $this-> Apellidos,
			'Genero' => $this-> Genero,
			'Direccion' => $this-> Direccion,
			'Telefono' => $this-> Telefono,
			'email' => $this-> email,
			'FechaNacimiento' => $this-> FechaNacimiento,
			'ciudades_id' => $this-> ciudades_id,
			'DPI' => $this-> DPI,
			'user_id' => $this-> user_id,
			'Avatar' => $this-> Avatar,
			'IsAdmin' => $this-> IsAdmin
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Cliente Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Cliente::where('id', $id);
            $record->delete();
        }
    }
}
