<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Gift Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="Monto"></label>
                <input wire:model="Monto" type="text" class="form-control" id="Monto" placeholder="Monto">@error('Monto') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="clientes_id"></label>
                <input wire:model="clientes_id" type="text" class="form-control" id="clientes_id" placeholder="Clientes Id">@error('clientes_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="CODE"></label>
                <input wire:model="CODE" type="text" class="form-control" id="CODE" placeholder="Code">@error('CODE') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="Porcentual"></label>
                <input wire:model="Porcentual" type="text" class="form-control" id="Porcentual" placeholder="Porcentual">@error('Porcentual') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="reclaimed_at"></label>
                <input wire:model="reclaimed_at" type="text" class="form-control" id="reclaimed_at" placeholder="Reclaimed At">@error('reclaimed_at') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>
