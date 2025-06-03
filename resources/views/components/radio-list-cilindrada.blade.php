 <div class="row">
    @foreach($cilindradas as $cilindrada)
        <div class="col">
            <label class="inline-radio">
              <input type="radio" name="cilindrada_id" value="{{$cilindrada->id}}" 
              @checked($attributes->get('value') == $cilindrada->id)/>
                {{$cilindrada->name}}
            </label>
        </div>
    @endforeach
 </div>