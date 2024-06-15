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
    public $setting;

    public function mount($setting = null)
    {
        $this->inputType = reset(Setting::$keys);

        $this->setting = $setting;
        if($setting)
        {
            $this->key = $setting->key;
            if($setting->type == "textarea")
            {
                $this->text_value = $setting->value;
            }elseif($setting->type == "text")
            {
                $this->value = $setting->value;
            }else{
                $this->image_value = $this->value;
            }
            $this->inputType = $setting->type;
        }
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
        toast('Setting done Successfully','success');

        return redirect()->route('setting.index');
    }
}
