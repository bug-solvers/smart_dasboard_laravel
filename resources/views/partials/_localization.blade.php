@foreach (\App\Services\TranslatableService::getTranslatableInputs($model) as $name => $data)
    @if(isset($data['is_textarea']) && !$data['is_textarea'])
        <label for="{{$name}}" >{{ trans("admin.program.$name")}}<span class="text-danger">*</span></label>

        <input type="text" id="{{$name}}" name="{{$name}}" class="form-control"
               value="{{ old($name, isset($program) ? $program->getTranslation('name', $data['lang']) : '') }}"
               placeholder="{{ trans("admin.program.$name")}}">
        @error($name)
        <span class="text-danger">{{$message}}</span>
        @enderror
    @endif
    @if(isset($data['is_textarea']) && $data['is_textarea'])
        <div class="col-md-6 mt-3">
            <label for="{{$name}}">
                <span class="text-danger">*</span>
                {{ trans('admin.program.description_' . $data['lang'])}}
            </label>
            <textarea class="form-control" name="{{$name}}" id="{{$name}}" placeholder="{{ trans("admin.program.$name")}}">{{old($name , isset($program) ? $program->getTranslation('description',$data['lang']) : '')}}</textarea>
            @error($name)
            <span class="text-danger">*{{$message}}</span>
            @enderror
        </div>
    @endif
@endforeach
