<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Menu;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->page;
        $category = Menu::where('id', $page)->get();
        $pages = StaticPage::where('category_id', $page)->get();
        $language = Language::all();
        return view('admin.pages.staticpage', compact('pages', 'category', 'language'));
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
        StaticPage::create([
            'category_id' => $request->page,
            'content_az' => str_replace("&#39;", "'", $request->content_az),
            'content_en' => str_replace("&#39;", "'", $request->content_en),
            'content_ru' => str_replace("&#39;", "'", $request->content_ru),
        ]);

        alert()->success('Uğurlu', 'Əlavə olundu')
            ->showConfirmButton('Tamam', '#3085d6');

        return redirect()->route('static-page.index', ['page'=>$request->page]);
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
    public function update(Request $request, $id)
    {
        $postUpdate = StaticPage::find($id);
        $postUpdate->category_id = $request->page;
        $postUpdate->content_az = str_replace("&#39;", "'", $request->content_az);
        $postUpdate->content_en = str_replace("&#39;", "'", $request->content_en);
        $postUpdate->content_ru = str_replace("&#39;", "'", $request->content_ru);

        $postUpdate->save();

        alert()->success('Uğurlu', 'Redaktə olundu')
            ->showConfirmButton('Tamam', '#3085d6');

        return redirect()->route('static-page.index', ['page'=>$request->page]);
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
    public function upload(Request $request) {
        if ($request->hasFile("upload")){
            $originname=$request->file("upload")->getClientOriginalName();
            $filename=pathinfo($originname,PATHINFO_FILENAME);
            $extension=$request->file("upload")->getClientOriginalExtension();
            $filename=$filename."_".time().".".$extension;

            $request->file("upload")->move(public_path("ckImage"),$filename);

            $CKEditorfuncNum=$request->input("CKEditorFuncNum");
            $url=asset("ckImage/".$filename);
            $msg="Succesfully";
            $response="<script>window.parent.CKEDITOR.tools.callFunction($CKEditorfuncNum,'$url','$msg')</script>";

            header("Content-type: text/html;charset-utf-8");
            echo $response;
        }
    }
}
