@dd($label)
 <select name="$select_name[]" data-label="$label" multiple="" required>
    @for($i=0;$i<count($answer);$i++)
    @if(in_array($answer[$i],array ($param)))
    <option value="{{old('cf_1193[]')}}" selected>{{$answer[$i]}}</option>
    @else
    <option value="{{old('cf_1193[]')}}" >{{$answer[$i]}}</option>
    @endif
    @endfor
</selected>
    
