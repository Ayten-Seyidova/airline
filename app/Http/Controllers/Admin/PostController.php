<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Language;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lang = Language::all();
        $search = $request->search;

        $sliders = Post::where('title_az', 'like', "%$search%")->orderBy('id', 'desc')->paginate(10);

        return view('admin.pages.post', compact('sliders', 'lang'));
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
    public function store(PostRequest $request)
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

        $postObj = new Post;
        $postTitle = $request->title_az;
        $postTitleURL = Str::slug($postTitle, '-');

        $checkSlug = $postObj->whereSlug($postTitleURL)->exists();

        if ($checkSlug) {
            $numericalPrefix = 1;
            while (1) {
                $newSlug = $postTitleURL . "-" . $numericalPrefix++;
                $newSlug = Str::slug($newSlug);
                $checkSlug = $postObj->whereSlug($newSlug)->exists();
                if (!$checkSlug) {
                    $slug = $newSlug;
                    break;
                }
            }
        } else {
            $slug = $postTitleURL;
        }

        Post::create([
            'title_az' => $request->title_az,
            'slug' => $slug,
            'title_en' => $request->title_en,
            'title_ru' => $request->title_ru,
            'content_az' => $request->content_az,
            'content_en' => $request->content_en,
            'content_ru' => $request->content_ru,
            'status' => isset($request->status) ? 1 : 0,
            'image' => $image ? $path . $name : 'postImage/noPhoto.png',
        ]);

        alert()->success('Uğurlu', 'Əlavə olundu')
            ->showConfirmButton('Tamam', '#3085d6');

        return redirect()->route('post.index');
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
        $slider = Post::find($id);
        return response()->json(['slider' => $slider], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $sliderUpdate = Post::find($id);

        $image = $request->file('image');
        if ($_POST['hidden'] == "0") {
            $sliderUpdate->image = 'postImage/noPhoto.png';
        } else if ($image && $_POST['hidden'] == "1") {
            $name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $explode = explode('.', $name);
            $name = $explode[0] . '_' . now()->format('d-m-Y_H-i-s') . '.' . $extension;
            $path = 'postImage/';
            $request->image->move(public_path('storage/postImage/'), $name);
            $sliderUpdate->image = $path . $name;
        }

        $postObj = new Post;
        $postTitle = $request->title_az;
        $postTitleURL = Str::slug($postTitle, '-');

        $checkSlug = $postObj->whereSlug($postTitleURL)->exists();

        if ($checkSlug) {
            $numericalPrefix = 1;
            while (1) {
                $newSlug = $postTitleURL . "-" . $numericalPrefix++;
                $newSlug = Str::slug($newSlug);
                $checkSlug = $postObj->whereSlug($newSlug)->exists();
                if (!$checkSlug) {
                    $slug = $newSlug;
                    break;
                }
            }
        } else {
            $slug = $postTitleURL;
        }

        $sliderUpdate->title_az = $request->title_az;
        $sliderUpdate->title_en = $request->title_en;
        $sliderUpdate->title_ru = $request->title_ru;
        $sliderUpdate->content_az = $request->content_az;
        $sliderUpdate->content_en = $request->content_en;
        $sliderUpdate->content_ru = $request->content_ru;
        $sliderUpdate->slug = $slug;
        $sliderUpdate->status = isset($request->status) ? 1 : 0;

        $sliderUpdate->save();

        alert()->success('Uğurlu', 'Redaktə olundu')
            ->showConfirmButton('Tamam', '#3085d6');

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id)->delete();
        return response()->json(['message' => 'Uğurlu']);
    }

    public function changeStatus(Request $request)
    {
        try {
            $postID = $request->id;
            $post = Post::find($postID);
            $status = $post->status;
            $post->status = $status ? 0 : 1;

            $post->save();

            return response()->json(['message' => 'Uğurlu', 'status' => $post->status], 200);
        } catch (\Exception $exception) {
            return response()->json(['message' => 'Xəta', 'status' => $post->status], 500);
        }
    }

    public function upload(Request $request)
    {
        if ($request->hasFile("upload")) {
            $originname = $request->file("upload")->getClientOriginalName();
            $filename = pathinfo($originname, PATHINFO_FILENAME);
            $extension = $request->file("upload")->getClientOriginalExtension();
            $filename = $filename . "_" . time() . "." . $extension;

            $request->file("upload")->move(public_path("CkImage"), $filename);

            $CKEditorfuncNum = $request->input("CKEditorFuncNum");
            $url = asset("CkImage/" . $filename);
            $msg = "Succesfully";
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorfuncNum,'$url','$msg')</script>";

            header("Content-type: text/html;charset-utf-8");
            echo $response;
        }
    }
}
