<?php

namespace App\Http\Controllers\Apps;

use App\DataTables\CouponDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\CouponRequest;
use App\Models\Admin;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CouponDataTable $dataTable)
    {
        return $dataTable->render('pages/apps.coupon.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.apps.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        Coupon::create([
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
//        toast('Coupon Created Successfully','success');
        return to_route('coupon.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($adminId)
    {
        $admin = Admin::find($adminId);
        return view('pages/apps.user-management.users.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        return view('pages.apps.coupon.edit',compact('coupon'));
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
//        toast('Coupon Updated Successfully','success');
        return to_route('coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return to_route('coupon.index');
    }
}
