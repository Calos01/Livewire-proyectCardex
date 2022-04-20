<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Catalogo;

class Catalogos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name_category;
    public $updateMode = false;


    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.catalogos.view', [
            'catalogos' => Catalogo::latest()
						->orWhere('name_category', 'LIKE', $keyWord)
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
		$this->name_category = null;
    }

    public function store()
    {
        $this->validate([
		'name_category' => 'required',
        ]);

        Catalogo::create([
			'name_category' => $this-> name_category
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Catalogo Successfully created.');
    }

    public function edit($id)
    {
        $record = Catalogo::findOrFail($id);

        $this->selected_id = $id;
		$this->name_category = $record-> name_category;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name_category' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Catalogo::find($this->selected_id);
            $record->update([
			'name_category' => $this-> name_category
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Catalogo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Catalogo::where('id', $id);
            $record->delete();
        }
    }
}
