 {{-- @dd($options,$value) --}}
 <select name="$name[]" data-label="$label" multiple="" required>
    @foreach($options as $item)
        {{-- @if(in_array($item,$valueArrays)) --}}
            {{-- <option value="{{ $item }}" selected>{{ $item }}</option> --}}
        {{-- @else --}}
            <option value="{{ $item }}" >{{ $item }}</option>
        {{-- @endif --}}
    @endforeach
</select>
    
