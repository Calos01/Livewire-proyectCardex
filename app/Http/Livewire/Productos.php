<?php

namespace App\Http\Livewire;

use App\Models\Catalogo;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;

class Productos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $catalogo_id, $fecha_ingreso, $fecha_salida, $marca, $presentacion, $lote, $fecha_vencimiento, $resp_ingreso, $resp_salida, $precio_sin_igv, $area, $cant_entrada, $cant_salida, $saldo;
    public $updateMode = false;

    public function mount(){
      $this->catalogo_id='Elegir';
    }

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.productos.view', [
            'productos' => Producto::latest()
						->orWhere('catalogo_id', 'LIKE', $keyWord)
						->orWhere('fecha_ingreso', 'LIKE', $keyWord)
						->orWhere('fecha_salida', 'LIKE', $keyWord)
						->orWhere('marca', 'LIKE', $keyWord)
						->orWhere('presentacion', 'LIKE', $keyWord)
						->orWhere('lote', 'LIKE', $keyWord)
						->orWhere('fecha_vencimiento', 'LIKE', $keyWord)
						->orWhere('resp_ingreso', 'LIKE', $keyWord)
						->orWhere('resp_salida', 'LIKE', $keyWord)
						->orWhere('precio_sin_igv', 'LIKE', $keyWord)
						->orWhere('area', 'LIKE', $keyWord)
						->orWhere('cant_entrada', 'LIKE', $keyWord)
						->orWhere('cant_salida', 'LIKE', $keyWord)
						->orWhere('saldo', 'LIKE', $keyWord)
						->paginate(10),
            'catalogos'=> Catalogo::orderBy('name_category', 'asc')->get(),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->catalogo_id = null;
		$this->fecha_ingreso = null;
		$this->fecha_salida = null;
		$this->marca = null;
		$this->presentacion = null;
		$this->lote = null;
		$this->fecha_vencimiento = null;
		$this->resp_ingreso = null;
		$this->resp_salida = null;
		$this->precio_sin_igv = null;
		$this->area = null;
		$this->cant_entrada = null;
		$this->cant_salida = null;
		$this->saldo = null;
    }

    public function store()
    {
        $this->validate([
		'catalogo_id' => 'required|not_in:Elegir',
		'fecha_ingreso' => 'required',
		'fecha_salida' => 'required',
		'marca' => 'required',
		'presentacion' => 'required',
		'lote' => 'required',
		'fecha_vencimiento' => 'required',
		'resp_ingreso' => 'required',
		'resp_salida' => 'required',
		'precio_sin_igv' => 'required',
		'area' => 'required',
		'cant_entrada' => 'required',
		'cant_salida' => 'required',
		'saldo' => 'required',
        ]);

        Producto::create([
			'catalogo_id' => $this-> catalogo_id,
			'fecha_ingreso' => $this-> fecha_ingreso,
			'fecha_salida' => $this-> fecha_salida,
			'marca' => $this-> marca,
			'presentacion' => $this-> presentacion,
			'lote' => $this-> lote,
			'fecha_vencimiento' => $this-> fecha_vencimiento,
			'resp_ingreso' => $this-> resp_ingreso,
			'resp_salida' => $this-> resp_salida,
			'precio_sin_igv' => $this-> precio_sin_igv,
			'area' => $this-> area,
			'cant_entrada' => $this-> cant_entrada,
			'cant_salida' => $this-> cant_salida,
			'saldo' => $this-> saldo
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Producto Successfully created.');
    }

    public function edit($id)
    {
        $record = Producto::findOrFail($id);

        $this->selected_id = $id;
		$this->catalogo_id = $record-> catalogo_id;
		$this->fecha_ingreso = $record-> fecha_ingreso;
		$this->fecha_salida = $record-> fecha_salida;
		$this->marca = $record-> marca;
		$this->presentacion = $record-> presentacion;
		$this->lote = $record-> lote;
		$this->fecha_vencimiento = $record-> fecha_vencimiento;
		$this->resp_ingreso = $record-> resp_ingreso;
		$this->resp_salida = $record-> resp_salida;
		$this->precio_sin_igv = $record-> precio_sin_igv;
		$this->area = $record-> area;
		$this->cant_entrada = $record-> cant_entrada;
		$this->cant_salida = $record-> cant_salida;
		$this->saldo = $record-> saldo;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'catalogo_id' => 'required|not_in:Elegir',
		'fecha_ingreso' => 'required',
		'fecha_salida' => 'required',
		'marca' => 'required',
		'presentacion' => 'required',
		'lote' => 'required',
		'fecha_vencimiento' => 'required',
		'resp_ingreso' => 'required',
		'resp_salida' => 'required',
		'precio_sin_igv' => 'required',
		'area' => 'required',
		'cant_entrada' => 'required',
		'cant_salida' => 'required',
		'saldo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Producto::find($this->selected_id);
            $record->update([
			'catalogo_id' => $this-> catalogo_id,
			'fecha_ingreso' => $this-> fecha_ingreso,
			'fecha_salida' => $this-> fecha_salida,
			'marca' => $this-> marca,
			'presentacion' => $this-> presentacion,
			'lote' => $this-> lote,
			'fecha_vencimiento' => $this-> fecha_vencimiento,
			'resp_ingreso' => $this-> resp_ingreso,
			'resp_salida' => $this-> resp_salida,
			'precio_sin_igv' => $this-> precio_sin_igv,
			'area' => $this-> area,
			'cant_entrada' => $this-> cant_entrada,
			'cant_salida' => $this-> cant_salida,
			'saldo' => $this-> saldo
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
