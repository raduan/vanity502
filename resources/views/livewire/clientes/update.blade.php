<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="Nombres"></label>
                <input wire:model="Nombres" type="text" class="form-control" id="Nombres" placeholder="Nombres">@error('Nombres') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="Apellidos"></label>
                <input wire:model="Apellidos" type="text" class="form-control" id="Apellidos" placeholder="Apellidos">@error('Apellidos') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="Genero"></label>
                <input wire:model="Genero" type="text" class="form-control" id="Genero" placeholder="Genero">@error('Genero') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="Direccion"></label>
                <input wire:model="Direccion" type="text" class="form-control" id="Direccion" placeholder="Direccion">@error('Direccion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="Telefono"></label>
                <input wire:model="Telefono" type="text" class="form-control" id="Telefono" placeholder="Telefono">@error('Telefono') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="email"></label>
                <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="FechaNacimiento"></label>
                <input wire:model="FechaNacimiento" type="text" class="form-control" id="FechaNacimiento" placeholder="Fechanacimiento">@error('FechaNacimiento') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="ciudades_id"></label>
                <input wire:model="ciudades_id" type="text" class="form-control" id="ciudades_id" placeholder="Ciudades Id">@error('ciudades_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="DPI"></label>
                <input wire:model="DPI" type="text" class="form-control" id="DPI" placeholder="Dpi">@error('DPI') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="user_id"></label>
                <input wire:model="user_id" type="text" class="form-control" id="user_id" placeholder="User Id">@error('user_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="Avatar"></label>
                <input wire:model="Avatar" type="text" class="form-control" id="Avatar" placeholder="Avatar">@error('Avatar') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="IsAdmin"></label>
                <input wire:model="IsAdmin" type="text" class="form-control" id="IsAdmin" placeholder="Isadmin">@error('IsAdmin') <span class="error text-danger">{{ $message }}</span> @enderror
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
