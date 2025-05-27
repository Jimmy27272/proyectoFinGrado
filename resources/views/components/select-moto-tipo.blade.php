<select name="moto_tipo_id">
              <option value="">Tipo</option>
              @foreach($MotoTipos as $MotoTipo)
                <option value="{{$MotoTipo->id}}"
                  @selected($attributes->get('value') == $MotoTipo->id)>{{$MotoTipo->name}}</option>
              @endforeach
            </select>