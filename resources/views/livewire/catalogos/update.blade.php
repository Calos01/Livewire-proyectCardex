<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Catalogo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="name_category"></label>
                <select wire:model="name_category" class="form-control" id="name_category" placeholder="Name Category">
                    <option value="">Elegir Catalogo</option>
                    @foreach ($catalogos as $catalogo )
                        <option value="{{$catalogo->id}}">{{$catalogo->name_category}}</option>
                    @endforeach
                </select>
                @error('name_category') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn bg-red-500 hover:bg-red-700 text-white close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary bg-blue-500" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>
