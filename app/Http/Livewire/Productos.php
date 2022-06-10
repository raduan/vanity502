<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;

class Productos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Nombre, $Descripcion, $Marca, $Modelo, $Descuento, $Precio, $Existencias, $categoria_id, $Foto;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.productos.view', [
            'productos' => Producto::latest()
						->orWhere('Nombre', 'LIKE', $keyWord)
						->orWhere('Descripcion', 'LIKE', $keyWord)
						->orWhere('Marca', 'LIKE', $keyWord)
						->orWhere('Modelo', 'LIKE', $keyWord)
						->orWhere('Descuento', 'LIKE', $keyWord)
						->orWhere('Precio', 'LIKE', $keyWord)
						->orWhere('Existencias', 'LIKE', $keyWord)
						->orWhere('categoria_id', 'LIKE', $keyWord)
						->orWhere('Foto', 'LIKE', $keyWord)
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
		$this->Descripcion = null;
		$this->Marca = null;
		$this->Modelo = null;
		$this->Descuento = null;
		$this->Precio = null;
		$this->Existencias = null;
		$this->categoria_id = null;
		$this->Foto = null;
    }

    public function store()
    {
        $this->validate([
		'Nombre' => 'required',
		'Descripcion' => 'required',
		'Precio' => 'required',
		'categoria_id' => 'required',
        ]);

        Producto::create([ 
			'Nombre' => $this-> Nombre,
			'Descripcion' => $this-> Descripcion,
			'Marca' => $this-> Marca,
			'Modelo' => $this-> Modelo,
			'Descuento' => $this-> Descuento,
			'Precio' => $this-> Precio,
			'Existencias' => $this-> Existencias,
			'categoria_id' => $this-> categoria_id,
			'Foto' => $this-> Foto
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Producto Successfully created.');
    }

    public function edit($id)
    {
        $record = Producto::findOrFail($id);

        $this->selected_id = $id; 
		$this->Nombre = $record-> Nombre;
		$this->Descripcion = $record-> Descripcion;
		$this->Marca = $record-> Marca;
		$this->Modelo = $record-> Modelo;
		$this->Descuento = $record-> Descuento;
		$this->Precio = $record-> Precio;
		$this->Existencias = $record-> Existencias;
		$this->categoria_id = $record-> categoria_id;
		$this->Foto = $record-> Foto;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'Nombre' => 'required',
		'Descripcion' => 'required',
		'Precio' => 'required',
		'categoria_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Producto::find($this->selected_id);
            $record->update([ 
			'Nombre' => $this-> Nombre,
			'Descripcion' => $this-> Descripcion,
			'Marca' => $this-> Marca,
			'Modelo' => $this-> Modelo,
			'Descuento' => $this-> Descuento,
			'Precio' => $this-> Precio,
			'Existencias' => $this-> Existencias,
			'categoria_id' => $this-> categoria_id,
			'Foto' => $this-> Foto
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Producto Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Producto::where('id', $id);
            $record->delete();
        }
    }
}
