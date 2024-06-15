<?php

namespace App\Http\Controllers\Apps;

use App\DataTables\CouponDataTable;
use App\DataTables\SEOMainDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\CouponRequest;
use App\Http\Requests\SEO\SEOMainRequest;
use App\Models\Admin;
use App\Models\Coupon;
use App\Models\SEOMain;
use App\Models\User;
use Illuminate\Http\Request;

class SEOMainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SEOMainDataTable $dataTable)
    {
        return $dataTable->render('pages/apps.SEOMain.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.apps.SEOMain.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SEOMainRequest $request)
    {
        SEOMain::updateOrCreate(['key' => $request->key],[
            'value' => $request->value
        ]);
        toast('SEO Created Successfully','success');
        return to_route('seo.main.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($seoId)
    {
       $seo = SEOMain::find($seoId);
        return view('pages.apps.SEOMain.edit',compact('seo'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($seoId)
    {
        $seo = SEOMain::find($seoId);
        $seo->delete();
        toast('SEO Deleted Successfully','success');
        return to_route('seo.main.index');
    }
}
