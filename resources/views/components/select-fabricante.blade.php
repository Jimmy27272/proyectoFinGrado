<select id="fabricanteSelect" name="fabricante_id">
      <option value="">Fabricante</option>
        @foreach($fabricantes as $fabricante)
        <option value="{{$fabricante->id}}" @selected($attributes->get('value') == $fabricante->id)>{{$fabricante->name}}</option> 
        @endforeach
</select> 