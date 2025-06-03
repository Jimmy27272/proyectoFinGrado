@props(['moto' => null])  

{{-- Componente para mostrar las características de la moto como checkboxes --}}
{{-- $moto es opcional, si no se pasa, se asume que es una nueva moto sin características predefinidas --}}


@php
    $features = [
        "garantia" => 'Garantía oficial',
        "unico_propietario" => 'Único propietario',
        "limitable" => 'Limitable carnet A2',
        "abs" =>'ABS',
        "control_crucero" =>'Control de crucero',
        "bluetooth" =>'Conectividad Bluetooth',
        "puños" =>'Puños Calefactables',
        "gps" =>'GPS',
        "alforjas" =>'Alforjas',
        "control_traccion" =>'Control de tracción',
        "led" =>'Luces LED',
        "usb" =>'Cargador USB',
    ]

@endphp


    <div class="form-group">
        <div class="row">
            <div class="col">
                @foreach($features as $key => $feature)
                    <label class="checkbox">
                        <input
                          type="checkbox"
                          name="features[{{ $key }}]"
                          value="1"
                          @checked(old('features.'.$key, $moto?->features->$key)) {{-- Marca el checkbox como "checked" si se había seleccionado previamente (old input)
    o si la moto ya tiene esta característica asignada (en caso de edición). --}}
                        />
                        {{ $feature }}
                    </label>

                    @if($loop->iteration % 6 ==0 && !$loop->last) {{-- Cada 6 elementos, cerramos la columna actual y abrimos una nueva columna,
    excepto si estamos en el último elemento del bucle. --}}
                        </div>
                        <div class="col">
                    @endif
                 @endforeach
            </div>
        </div>
    </div>
                    
                    