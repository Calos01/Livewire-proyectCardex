<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="catalogo_id">Elegir Catalogo</label>
                <select wire:model="catalogo_id" class="form-control">
                    <option value="" disabled>--Elegir Catalogo--</option>
                    @foreach ( $catalogos as $catalogo )
                    <option value="{{$catalogo->id}}">{{$catalogo->name_category}}</option>
                    @endforeach
                </select>
                @error('catalogo_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha_ingreso"></label>
                <input wire:model="fecha_ingreso" type="text" class="form-control" id="fecha_ingreso" placeholder="Fecha Ingreso">@error('fecha_ingreso') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha_salida"></label>
                <input wire:model="fecha_salida" type="text" class="form-control" id="fecha_salida" placeholder="Fecha Salida">@error('fecha_salida') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="marca"></label>
                <input wire:model="marca" type="text" class="form-control" id="marca" placeholder="Marca">@error('marca') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="presentacion"></label>
                <input wire:model="presentacion" type="text" class="form-control" id="presentacion" placeholder="Presentacion">@error('presentacion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="lote"></label>
                <input wire:model="lote" type="text" class="form-control" id="lote" placeholder="Lote">@error('lote') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha_vencimiento"></label>
                <input wire:model="fecha_vencimiento" type="text" class="form-control" id="fecha_vencimiento" placeholder="Fecha Vencimiento">@error('fecha_vencimiento') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="resp_ingreso"></label>
                <input wire:model="resp_ingreso" type="text" class="form-control" id="resp_ingreso" placeholder="Resp Ingreso">@error('resp_ingreso') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="resp_salida"></label>
                <input wire:model="resp_salida" type="text" class="form-control" id="resp_salida" placeholder="Resp Salida">@error('resp_salida') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="precio_sin_igv"></label>
                <input wire:model="precio_sin_igv" type="text" class="form-control" id="precio_sin_igv" placeholder="Precio Sin Igv">@error('precio_sin_igv') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="area"></label>
                <input wire:model="area" type="text" class="form-control" id="area" placeholder="Area">@error('area') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cant_entrada"></label>
                <input wire:model="cant_entrada" type="text" class="form-control" id="cant_entrada" placeholder="Cant Entrada">@error('cant_entrada') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cant_salida"></label>
                <input wire:model="cant_salida" type="text" class="form-control" id="cant_salida" placeholder="Cant Salida">@error('cant_salida') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="saldo"></label>
                <input wire:model="saldo" type="text" class="form-control" id="saldo" placeholder="Saldo">@error('saldo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn bg-red-500 hover:bg-red-700 text-white" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary bg-blue-500" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>
