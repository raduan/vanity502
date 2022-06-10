Agregar Productos
<form enctype="multipart/form-data" action="{{ url('/producto') }}" method="POST">
@csrf
@include('producto.form')
</form>
