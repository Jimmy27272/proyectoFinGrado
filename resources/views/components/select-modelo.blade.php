 <select id="modeloSelect" name="modelo_id">
    <option value="" style="display: block">Modelo</option>
      @foreach($modelos as $modelo)
        <option value="{{$modelo->id}}" data-parent="{{$modelo->fabricante_id}}"  
        @selected($attributes->get('value') == $modelo->id)>
          {{$modelo->name}}
        </option>
      @endforeach
  </select>

  <!--
  Cada opción del select de modelos incluye un atributo data-parent que hace referencia al fabricante al que pertenece.
  Este atributo es utilizado por JavaScript para filtrar dinámicamente los modelos según el fabricante seleccionado.
-->