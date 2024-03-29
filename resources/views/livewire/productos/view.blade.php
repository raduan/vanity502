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
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>Marca</th>
								<th>Modelo</th>
								<th>Descuento</th>
								<th>Precio</th>
								<th>Existencias</th>
								<th>Categoria Id</th>
								<th>Foto</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($productos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->Nombre }}</td>
								<td>{{ $row->Descripcion }}</td>
								<td>{{ $row->Marca }}</td>
								<td>{{ $row->Modelo }}</td>
								<td>{{ $row->Descuento }}</td>
								<td>{{ $row->Precio }}</td>
								<td>{{ $row->Existencias }}</td>
								<td>{{ $row->categoria_id }}</td>
								<td>{{ $row->Foto }}</td>
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
							@endforeach
						</tbody>
					</table>						
					{{ $productos->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
