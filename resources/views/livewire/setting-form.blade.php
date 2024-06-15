<div class="container">
    <div class="col mt-2">
        <div class="mb-3">
            <label for="type">{{ __('admin.Key') }}</label>
            <select class="form-control select-option formInput" wire:model="key" wire:change="changeInputType($event.target.value)" name="key">
                @foreach(\App\Models\Setting::$keys as $key => $value)
                    <option value="{{ $key }}">{{ $key }}</option>
                @endforeach
            </select>
            @error('key')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    @if($inputType == "file")
        <div class="col-md-12 mb-3">
            <label for="icon">{{ __('admin.icon') }}</label>
            <input type="file" name="image_value" class="form-control" wire:model="image_value">
            @error('image_value')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    @elseif($inputType == "text")
        <div class="col-md-12 mb-3">
            <label for="value">{{ __('admin.Value') }}</label>
            <input type="text" wire:model="value" name="value" id="value" value="{{ isset($privacySetting) && $privacySetting->type == 'text' ? $privacySetting->value : old('value') }}" class="form-control" placeholder="value">
            @error('value')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    @elseif($inputType == "textarea")
        <div class="col-md-12 mb-3">
            <label for="body">{{ __('admin.Value') }}</label>
            <textarea class="form-control @error('text_value') is-invalid fparsley-error parsley-error @enderror" id="body" name="text_value" rows="5" wire:model="text_value">{!! isset($privacySetting) && $privacySetting->type == 'textarea' ? $privacySetting->value : old('text_value') !!}</textarea>
            @error('text_value')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    @endif

    <div class="input-group col-sm-12 mb-4 mt-5">
        <button type="submit" wire:click.prevent="store"  class="btn btn-primary">{{ __('admin.Submit') }}</button>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.tiny.cloud/1/1x95in08jsivihseg2w5ae6dd0m41w3q5pn559acmpuam8r4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener('livewire:load', function () {
            tinymce.init({
                selector: 'textarea#body',
                setup: function (editor) {
                    editor.on('change', function () {
                        @this.set('text_value', editor.getContent());
                    });
                }
            });
        });
    </script>
@endpush
