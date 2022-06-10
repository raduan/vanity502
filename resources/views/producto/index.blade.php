Cat&aacute;logo de Productos
<table class="table table-light" border="1">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Producto</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($productos as $producto)
        <tr>
            <td><img src="{{ asset('storage').'/'.$producto->Foto }}" width="120"></td>
            <td><div valign="top">{{ $producto->Nombre }}</div>
            <div>{{ $producto->Descripcion }}</div>
            </td>
            <td >

            <form action="{{ url('/producto/'. $producto->id . '/edit' ) }}" method="GET">
                @csrf
                <input type="submit" value="Modificar">

            </form>

            |
                <form action="{{ url('/producto/'. $producto->id ) }}" method="POST">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" value="Eliminar" onclick="return confirm('Estas seguro de Eliminar este Registro?')">

            </form>
        
        </td>
        </tr>
        @endforeach
    </tbody>
</table>