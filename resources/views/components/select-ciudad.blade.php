<select id="ciudadSelect" name="ciudad_id">
  <option value="">Ciudad</option>
  @foreach($ciudades as $ciudad)
    <option value="{{$ciudad->id}}" data-parent="{{$ciudad->comunidad_id}}"
    @selected($attributes->get('value') == $ciudad->id)>
      {{$ciudad->name}}
    </option>
  @endforeach
</select>

<!--
Cada opción del select de ciudades incluye un atributo data-parent que hace referencia a la comunidad a la que pertenece.-->