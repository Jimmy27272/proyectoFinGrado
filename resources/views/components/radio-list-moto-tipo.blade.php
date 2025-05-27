<div class="row">
    @foreach($MotoTipos as $MotoTipo)
     <div class="col">
                      <label class="inline-radio">
                        <input type="radio" name="moto_tipo_id"  value="{{$MotoTipo->id}}" 
                        @checked($attributes->get('value') == $MotoTipo->id)/>
                        {{ $MotoTipo->name }}
                      </label>
                    </div>
    @endforeach
                </div>