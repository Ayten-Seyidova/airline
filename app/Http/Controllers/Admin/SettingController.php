<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language = Language::all();
        $settings = Setting::where('id', 1)->get();

        return view('admin.pages.setting', compact('settings', 'language'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id)
    {
        $settings = Setting::find($id);

        $settings->mail = $request->mail;
        $settings->phone = $request->phone;
        $settings->fax = $request->fax;
        $settings->title_az = $request->title_az;
        $settings->title_en = $request->title_en;
        $settings->title_ru = $request->title_ru;
        $settings->description_az = $request->description_az;
        $settings->description_en = $request->description_en;
        $settings->description_ru = $request->description_ru;
        $settings->keywords_az = $request->keywords_az;
        $settings->keywords_en = $request->keywords_en;
        $settings->keywords_ru = $request->keywords_ru;
        $settings->address_az = $request->address_az;
        $settings->address_en = $request->address_en;
        $settings->address_ru = $request->address_ru;
        $settings->save();

        alert()->success('Uğurlu', 'Tənzimləmələr redaktə olundu')
            ->showConfirmButton('Tamam', '#3085d6');

        return redirect()->route('settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
