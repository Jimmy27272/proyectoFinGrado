@props(['moto' => null])




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
                          @checked(old('features.'.$key, $moto?->features->$key))
                        />
                        {{ $feature }}
                        </label>

                            @if($loop->iteration % 6 ==0 && !$loop->last)
                                </div>
                                <div class="col">
                            @endif
                        @endforeach
                    </div>
                    </div>
                    </div>
                    
                    