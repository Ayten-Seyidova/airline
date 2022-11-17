<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;

class PhotoGalleryController extends Controller
{
    public function dropzone()
    {
        $photos = PhotoGallery::orderBy('id', 'desc')->paginate(10);

        return view('admin.pages.photo', compact('photos'));
    }

    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');
        $name = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $explode = explode('.', $name);
        $name = $explode[0] . '_' . now()->format('d-m-Y_H-i-s') . '.' . $extension;
        $path = 'postImage/';
        $request->file->move(public_path('storage/postImage/'),$name);

        $imageUpload = new PhotoGallery();
        $imageUpload->image = $path . $name;
        $imageUpload->save();

        return redirect()->route('dropzonePhoto');
    }

    public function dropzoneDestroy(Request $request)
    {
        $id = $request->id;
        PhotoGallery::where('id', $id)->delete();
        return response()->json(['message', 'Uğurlu'], 200);
    }
}
