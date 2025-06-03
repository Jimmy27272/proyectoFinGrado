<select id="comunidadSelect" name="comunidad_id">
  <option value="">Comunidad</option>
  @foreach($comunidades as $comunidad)
    <option value="{{$comunidad->id}}"
    @selected($attributes->get('value') == $comunidad->id)>{{$comunidad->name}}</option>
  @endforeach
</select>