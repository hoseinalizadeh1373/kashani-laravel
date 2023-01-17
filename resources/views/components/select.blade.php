@php
  $values = explode(' |##| ',$value);
@endphp
 <select name="{{$name}}" data-label="{{$label}}" {{$attribute}}>
@if(!str_contains($attribute,'multiple')) 
<option value="" >انتخاب مقدار</option>    
@endif
    @foreach($options as $item)
         @if(in_array($item,$values)) 
         <option value="{{ $item }}" selected>{{ $item }}</option> 
         @else 
            <option value="{{ $item }}" >{{ $item }}</option>
         @endif 
    @endforeach
</select>
    
