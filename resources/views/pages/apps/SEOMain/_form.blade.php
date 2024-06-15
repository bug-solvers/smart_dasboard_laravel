@csrf
<label for="type">{{ __('admin.Key') }}</label>
<select class="form-control select-option formInput" name="key">
    @foreach(\App\Models\SEOMain::$keys as $key => $value)
        <option @if(isset($seo) && $seo->key == $key) selected @endif value="{{ $key }}">{{ $key }}</option>
    @endforeach
</select>
@error('key')
<span class="text-danger">{{ $message }}</span>
@enderror


<label for="value">Value</label>
<input type="text" name="value" id="value" class="form-control" value="{{isset($seo) ? $seo->value : old('value')}}" placeholder="Enter Value">
@error('value')
<span class="text-danger">{{$message}}</span>
@enderror

<button type="submit" class="btn btn-success w-100 ">Submit</button>
