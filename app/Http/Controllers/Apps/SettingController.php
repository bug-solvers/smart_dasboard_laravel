<?php

namespace App\Http\Controllers\Apps;

use App\DataTables\CouponDataTable;
use App\DataTables\SettingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\CouponRequest;
use App\Models\Admin;
use App\Models\Coupon;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SettingDataTable $dataTable)
    {
        return $dataTable->render('pages/apps.settings.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.apps.settings.create');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        return view('pages.apps.settings.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        $coupon->update([
            'code'=>$request->code,
            'value'=>$request->value,
            'discount_limit'=>$request->discount_limit,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'usage_limit_per_user'=>$request->usage_limit_per_user,
            'usage_limit'=>$request->usage_limit,
            'status'=>$request->status,
            'minimum_using'=>$request->minimum_using,
            'notes'=>$request->notes,
        ]);
        toast('Coupon Updated Successfully','success');
        return to_route('coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        toast('Setting deleted successfully','success');
        return to_route('setting.index');
    }
}
