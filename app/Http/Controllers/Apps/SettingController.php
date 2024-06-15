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
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        toast('Setting deleted successfully','success');
        return to_route('setting.index');
    }
}
