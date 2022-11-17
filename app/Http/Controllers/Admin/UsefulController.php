<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsefulRequest;
use App\Models\Useful;
use Illuminate\Http\Request;

class UsefulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $posts = Useful::where('link', 'like', "%$search%")->orderBy('id', 'desc')->paginate(10);

        return view('admin.pages.useful', compact(  'posts'));
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
    public function store(UsefulRequest $request)
    {
        $image = $request->file('image');

        if ($image) {
            $name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $explode = explode('.', $name);
            $name = $explode[0] . '_' . now()->format('d-m-Y_H-i-s') . '.' . $extension;
            $path = 'postImage/';
            $request->image->move(public_path('storage/postImage/'),$name);
        }

        Useful::create([
            'link' => $request->link,
            'status' => isset($request->status) ? 1 : 0,
            'image' => $image ? $path . $name : 'postImage/noPhoto.png',
        ]);

        alert()->success('Uğurlu', 'Əlavə olundu')
            ->showConfirmButton('Tamam', '#3085d6');

        return redirect()->route('useful.index');
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
        $post = Useful::where('id', $id)->get();
        return response()->json(['post' => $post], 200);
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
        $postUpdate = Useful::find($id);

        $image = $request->file('image');
        if ($_POST['hidden'] == "0") {
            $postUpdate->image = 'postImage/noPhoto.png';
        } else if ($image && $_POST['hidden'] == "1") {
            $name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $explode = explode('.', $name);
            $name = $explode[0] . '_' . now()->format('d-m-Y_H-i-s') . '.' . $extension;
            $path = 'postImage/';
            $request->image->move(public_path('storage/postImage/'),$name);
            $postUpdate->image = $path . $name;
        }

        $postUpdate->link = $request->link;
        $postUpdate->status = isset($request->status) ? 1 : 0;

        $postUpdate->save();

        alert()->success('Uğurlu', 'Redaktə olundu')
            ->showConfirmButton('Tamam', '#3085d6');

        return redirect()->route('useful.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Useful::where('id', $id)->delete();
        return response()->json(['message' => 'Uğurlu']);
    }

    public function changeStatus(Request $request)
    {
        try {
            $postID = $request->id;
            $post = Useful::find($postID);
            $status = $post->status;
            $post->status = $status ? 0 : 1;

            $post->save();

            return response()->json(['message' => 'Uğurlu', 'status' => $post->status], 200);
        } catch (\Exception $exception) {
            return response()->json(['message' => 'Xəta', 'status' => $post->status], 500);
        }
    }
}
