@section('title', __('Productos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Producto Listing </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Productos">
						</div>
                        {{-- selectCatalogo --}}
                        <label for="catalogo_id">Elegir Catalogo</label>
                        <div >
                            <select wire:model="selectCatalogo" class="form-control">
                                <option value="">Todos</option>
                                @foreach ( $catalogos as $catalogo )
                                <option value="{{$catalogo->id}}">{{$catalogo->name_category}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{$selectCatalogo}}

						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Productos
						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.productos.create')
						@include('livewire.productos.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Catalogo Id</th>
								<th>Fecha Ingreso</th>
								<th>Fecha Salida</th>
								<th>Marca</th>
								<th>Presentacion</th>
								<th>Lote</th>
								<th>Fecha Vencimiento</th>
								<th>Resp Ingreso</th>
								<th>Resp Salida</th>
								<th>Precio Sin Igv</th>
								<th>Area</th>
								<th>Cant Entrada</th>
								<th>Cant Salida</th>
								<th>Saldo</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
                            @php
                                $total=0;
                            @endphp

							@foreach($productos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->catalogo_id }}</td>
								<td>{{ $row->fecha_ingreso }}</td>
								<td>{{ $row->fecha_salida }}</td>
								<td>{{ $row->marca }}</td>
								<td>{{ $row->presentacion }}</td>
								<td>{{ $row->lote }}</td>
								<td>{{ $row->fecha_vencimiento }}</td>
								<td>{{ $row->resp_ingreso }}</td>
								<td>{{ $row->resp_salida }}</td>
								<td>{{ $row->precio_sin_igv }}</td>
								<td>{{ $row->area }}</td>
								<td>{{ $row->cant_entrada }}</td>
								<td>{{ $row->cant_salida }}</td>
								<td>{{ $row->saldo }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>
									<a class="dropdown-item" onclick="confirm('Confirm Delete Producto id {{$row->id}}? \nDeleted Productos cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>
									</div>
								</div>
								</td>
                                @php
                                    $total=$total+$row->saldo;
                                @endphp
							@endforeach
						</tbody>
					</table>

                        <div>
                            <h1>Total es: {{$total}}</h1>
                        </div>
					{{ $productos->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
