<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourismRequest;
use App\Models\Category;
use App\Models\Language;
use App\Models\Tourism;
use Illuminate\Http\Request;
use Symfony\Polyfill\Ctype\Ctype;

class TourismController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;
        $categories = Category::all();
        $lang = Language::all();

        if (isset($category)) {
            $posts = Tourism::where('title_az', 'like', "%$search%")->with('category')->where('category_id', $category)->orderBy('id', 'desc')->paginate(10);
        } else {
            $posts = Tourism::where('title_az', 'like', "%$search%")->with('category')->orderBy('id', 'desc')->paginate(10);
        }

        return view('admin.pages.tourism', compact('categories', 'posts', 'lang'));
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
    public function store(TourismRequest $request)
    {
        $image = $request->file('image');

        if ($image) {
            $name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $explode = explode('.', $name);
            $name = $explode[0] . '_' . now()->format('d-m-Y_H-i-s') . '.' . $extension;
            $path = 'postImage/';
            $request->image->move(public_path('storage/postImage/'), $name);
        }

        Tourism::create([
            'category_id' => $request->category_id,
            'title_az' => $request->title_az,
            'title_en' => $request->title_en,
            'title_ru' => $request->title_ru,
            'link' => $request->link,
            'status' => isset($request->status) ? 1 : 0,
            'image' => $image ? $path . $name : 'postImage/noPhoto.png',
        ]);

        alert()->success('Uğurlu', 'Əlavə olundu')
            ->showConfirmButton('Tamam', '#3085d6');

        return redirect()->route('tourism.index');
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
        $post = Tourism::find($id);
        return response()->json(['post' => $post], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TourismRequest $request, $id)
    {
        $postUpdate = Tourism::find($id);

        $image = $request->file('image');
        if ($_POST['hidden'] == "0") {
            $postUpdate->image = 'postImage/noPhoto.png';
        } else if ($image && $_POST['hidden'] == "1") {
            $name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $explode = explode('.', $name);
            $name = $explode[0] . '_' . now()->format('d-m-Y_H-i-s') . '.' . $extension;
            $path = 'postImage/';
            $request->image->move(public_path('storage/postImage/'), $name);
            $postUpdate->image = $path . $name;
        }

        $postUpdate->category_id = $request->category_id;
        $postUpdate->title_az = $request->title_az;
        $postUpdate->title_en = $request->title_en;
        $postUpdate->title_ru = $request->title_ru;
        $postUpdate->link = $request->link;
        $postUpdate->status = isset($request->status) ? 1 : 0;

        $postUpdate->save();

        alert()->success('Uğurlu', 'Redaktə olundu')
            ->showConfirmButton('Tamam', '#3085d6');

        return redirect()->route('tourism.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tourism::where('id', $id)->delete();
        return response()->json(['message' => 'Uğurlu']);
    }

    public function changeStatus(Request $request)
    {
        try {
            $postID = $request->id;
            $post = Tourism::find($postID);
            $status = $post->status;
            $post->status = $status ? 0 : 1;

            $post->save();

            return response()->json(['message' => 'Uğurlu', 'status' => $post->status], 200);
        } catch (\Exception $exception) {
            return response()->json(['message' => 'Xəta', 'status' => $post->status], 500);
        }
    }
}
