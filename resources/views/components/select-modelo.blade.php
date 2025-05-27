 <select id="modeloSelect" name="modelo_id">
              <option value="" style="display: block">Modelo</option>
              @foreach($modelos as $modelo)
                <option value="{{$modelo->id}}" data-parent="{{$modelo->fabricante_id}}"
                  @selected($attributes->get('value') == $modelo->id)>
                    {{$modelo->name}}
                </option>
              @endforeach
            </select>