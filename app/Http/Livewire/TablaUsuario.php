<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class TablaUsuario extends Component
{
	use WithPagination;

	public User $usuario;
	public $roles = [];

	public $busqueda = '';
	public $orden = 'name';
	public $direccion = "asc";
	public $cantidad = '10';

	public $readyToLoad = false;

	public $openEdit = false;
	public $openDestroy = false;

	protected $rules = [
		'roles' => 'required|min:1',
	];

	protected $listeners = ['render'];

	public function mount()
	{
		$this->usuario = new User;
	}

	public function render()
	{
		if ($this->readyToLoad) {
			$usuarios = User::where('name', 'like', '%' . $this->busqueda . '%')
				->orWhere('email', 'like', '%' . $this->busqueda . '%')
				->orderBy($this->orden, $this->direccion)
				->paginate($this->cantidad);
		} else {
			$usuarios = [];
		}

		$listaRoles = Role::all();

		return view('livewire.tabla-usuario', compact('usuarios', 'listaRoles'));
	}

	public function updatingBusqueda()
	{
		$this->resetPage();
	}

	public function updatingCantidad()
	{
		$this->resetPage();
	}

	public function loadUsuarios()
	{
		$this->readyToLoad = true;
	}

	public function orden($orden)
	{
		if ($this->orden == $orden) {
			if ($this->direccion == 'desc') {
				$this->direccion = 'asc';
			} else {
				$this->direccion = 'desc';
			}
		} else {
			$this->orden = $orden;
			$this->direccion = 'asc';
		}
	}

	public function edit(User $usuario)
	{
		$this->usuario = $usuario;
		$this->roles = $this->usuario->roles()->allRelatedIds();

		$this->openEdit = true;
	}

	public function update()
	{
		$this->validate();

		$this->usuario->roles()->sync($this->roles);

		$this->reset(['openEdit', 'roles']);

		$this->emitTo('tabla-usuario', 'render');
		$this->emit('alert', 'Los roles fueron asignados satisfactoriamente');
	}

	public function destroy(User $usuario)
	{
		$this->usuario = $usuario;
		$this->openDestroy = true;
	}

	public function delete()
	{
		$this->usuario->delete();

		$this->reset('openDestroy');

		$this->emit('alert', 'El usuario se eliminó satisfactoriamente');
	}
}
