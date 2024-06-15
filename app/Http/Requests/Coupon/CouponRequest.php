<?php

namespace App\Http\Requests\Coupon;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'min:2', 'max:12', Rule::unique('coupons', 'code')->ignore(request('coupon')->id ?? null)],
            'value' => ['required', 'numeric', 'min:1'],
            'discount_limit' => ['required', 'numeric', 'min:1'],
            'start_date' => ['required', 'date', 'date_format:Y-m-d', ],
            'end_date' => ['required', 'date', 'date_format:Y-m-d', ],
            'usage_limit_per_user' => ['required', 'numeric', 'min:1'],
            'usage_limit' => ['required', 'numeric', 'min:1'],
            'status' => ['required',Rule::in(['archived','active'])],
            'minimum_using' => ['required', 'numeric', 'min:1'],
            'notes' => ['nullable', 'string', 'min:5'],
        ];
    }
}
