<div class="item">
    <label class="form-label" for="{{ $name }}">{{ $title }}</label>
    <input
    class="form-control" 
    type="number" 
    id="{{ $name }}" 
    name="{{ $name }}" 
    {{$readonly ?? "required"}} 
    {{$required ?? "readonly"}} 
    min="1" 
    step="1" 
    value="{{ $sessionValue ?? old($name) }}">
    @isset($select)
        <select class="form-select" name="{{ $name }}_unit" id="{{ $name }}_unit">
            <option value="mm{{$cube ?? ''}}" {{ old($name . '_unit') == 'mm' . ($cube ?? '') ? 'selected' : '' }}>мм{{$cube ?? ''}}</option>
            <option value="cm{{$cube ?? ''}}" {{ old($name . '_unit') == 'cm' . ($cube ?? '') ? 'selected' : '' }}>см{{$cube ?? ''}}</option>
            <option value="m{{$cube ?? ''}}" {{ old($name . '_unit') == 'm' . ($cube ?? '') ? 'selected' : '' }}>м{{$cube ?? ''}}</option>
        </select>
    @endisset
</div>