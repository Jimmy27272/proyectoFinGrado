<select name="cilindrada_id">
  <option value="">Cilindrada</option>
    @foreach($cilindradas as $cilindrada)
      <option value="{{$cilindrada->id}}"
      @selected($attributes->get('value') == $cilindrada->id)>{{$cilindrada->name}}</option>
    @endforeach
</select>