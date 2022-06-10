<label for="Nombre">Nombre</label>
<input type="text" value="{{ $producto->Nombre }}" name="Nombre"/>
<br/>
<label for="Descripcion">Descripci&oacute;n</label>
<input type="text" value="{{ $producto->Descripcion }}" name="Descripcion"/>
<br/>
<label for="Precio">Precio</label>
<input type="text" value="{{ $producto->Precio }}" name="Precio"/>
<br/>
<label for="Existencias">Existencias</label>
<input type="text" value="{{ $producto->Existencias }}" name="Existencias"/>
<br/>
<label for="Categoria">Categoria</label>
<input type="text" value="{{ $producto->Categoria }}" name="Categoria"/>
<br/>
<label for="Foto">Foto</label>
{{ $producto->Foto }}
<br/><input type="file" value="{{ $producto->Foto }}" name="Foto"/>
<br/>

<input type="submit" value="Guardar Producto"/>