Editar Producto
<form enctype="multipart/form-data" name="producto" action="{{ '/producto/' . $producto->id }}" method="POST">
@csrf
{{ method_field('PATCH') }}
@include('producto.form')

</form>