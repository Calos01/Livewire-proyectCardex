<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
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
                <input wire:model.defer="fecha_ingreso" type="date" class="form-control" id="fecha_ingreso" placeholder="Fecha Ingreso">@error('fecha_ingreso') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha_salida"></label>
                <input wire:model.defer="fecha_salida" type="date" class="form-control" id="fecha_salida" placeholder="Fecha Salida">@error('fecha_salida') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="marca"></label>
                <input wire:model.defer="marca" type="text" class="form-control" id="marca" placeholder="Marca">@error('marca') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="presentacion"></label>
                <input wire:model.defer="presentacion" type="text" class="form-control" id="presentacion" placeholder="Presentacion">@error('presentacion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="lote"></label>
                <input wire:model.defer="lote" type="number" class="form-control" id="lote" placeholder="Lote">@error('lote') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha_vencimiento"></label>
                <input wire:model.defer="fecha_vencimiento" type="date" class="form-control" id="fecha_vencimiento" placeholder="Fecha Vencimiento">@error('fecha_vencimiento') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="resp_ingreso"></label>
                <input wire:model.defer="resp_ingreso" type="text" class="form-control" id="resp_ingreso" placeholder="Resp Ingreso">@error('resp_ingreso') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="resp_salida"></label>
                <input wire:model.defer="resp_salida" type="text" class="form-control" id="resp_salida" placeholder="Resp Salida">@error('resp_salida') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="precio_sin_igv"></label>
                <input wire:model.defer="precio_sin_igv" type="number" class="form-control" id="precio_sin_igv" placeholder="Precio Sin Igv">@error('precio_sin_igv') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="area"></label>
                <input wire:model.defer="area" type="text" class="form-control" id="area" placeholder="Area">@error('area') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cant_entrada"></label>
                <input wire:model.defer="cant_entrada" type="number" class="form-control" id="entrada" step="0.01" placeholder="Cant Entrada" >@error('cant_entrada') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cant_salida"></label>
                <input wire:model.defer="cant_salida" type="number" class="form-control" id="salida" step="0.01" placeholder="Cant Salida" onchange="restar()" >@error('cant_salida') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="saldo"></label>

                <input wire:model="saldo" type="number" class="form-control" id="saldo" readonly step="0.01" >@error('saldo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-red-500 hover:bg-red-700 text-white close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary bg-blue-500 close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    function restar() {

         var num2=document.getElementById('salida').value;
         var num1=document.getElementById('entrada').value;

             var total=num1 - num2;
             return document.getElementById('saldo').value = total;

    }
</script>

