<?php

namespace App\Livewire;

use App\Models\Setting;
use Livewire\Component;

class SettingForm extends Component
{
    public $inputType;
    public $key;
    public $image_value;
    public $value;
    public $text_value;

    public function mount()
    {
        $this->inputType = reset(Setting::$keys);
    }

    public function render()
    {
        return view('livewire.setting-form');
    }

    public function changeInputType($key)
    {
        $this->key = $key;
        $this->inputType = Setting::$keys[$key];
    }

    public function store()
    {
        // Validate and store based on inputType
        if ($this->inputType == 'text') {
            Setting::updateOrCreate(
                ['key' => $this->key],
                ['value' => $this->value, 'type' => $this->inputType]
            );
        } elseif ($this->inputType == 'textarea') {
            Setting::updateOrCreate(
                ['key' => $this->key],
                ['value' => $this->text_value, 'type' => $this->inputType]
            );
        } elseif ($this->inputType == 'file') {
            $path = $this->uploadFile($this->image_value, Setting::PATH);
            Setting::updateOrCreate(
                ['key' => $this->key],
                ['value' => $path, 'type' => $this->inputType]
            );
        }

        // Reset form fields after successful storage
        $this->reset(['value', 'image_value', 'text_value']);

        // Optionally, dispatch a success message or event
        $this->dispatch('success', __('Setting saved successfully.'));
    }
}
