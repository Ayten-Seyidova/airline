<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Language;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $lang = Language::all();

        $allMenu = Menu::where('name_az', 'like', "%$search%")->orderBy('id', 'desc')->paginate(10);

        return view('admin.pages.menu', compact('lang', 'allMenu'));
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
    public function store(MenuRequest $request)
    {
        $type = $request->type;
        $slug = $request->slug;
        $name_az = $request->name_az;
        $name_en = $request->name_en;
        $name_ru = $request->name_ru;
        $parent_id = $request->parent_id;
        $order_number = $request->order_number;
        $status = isset($request->status) ? 1 : 0;

        Menu::create([
            'type' => $type,
            'slug' => $slug,
            'name_az' => $name_az,
            'name_en' => $name_en,
            'name_ru' => $name_ru,
            'order_number' => $order_number,
            'status' => $status,
            "parent_id"=>$parent_id

        ]);

        alert()->success('Uğurlu', 'Menyu əlavə olundu')
            ->showConfirmButton('Tamam', '#3085d6');

        return redirect()->route('menu.index');
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
        $menu = Menu::where('id', $id)->get();

        return response()->json(['menu' => $menu], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, $id)
    {
        $menuUpdate = Menu::find($id);

        $menuUpdate->type = $request->type;
        $menuUpdate->parent_id = $request->parent_id;
        $menuUpdate->slug = $request->slug;
        $menuUpdate->order_number = $request->order_number;
        $menuUpdate->name_az = $request->name_az;
        $menuUpdate->name_en = $request->name_en;
        $menuUpdate->name_ru = $request->name_ru;
        $menuUpdate->status = isset($request->status) ? 1 : 0;

        $menuUpdate->save();

        alert()->success('Uğurlu', 'Menyu redaktə olundu')
            ->showConfirmButton('Tamam', '#3085d6');

        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::where('id', $id)->delete();
        return response()->json(['message' => 'Uğurlu']);


    }

    public function changeStatus(Request $request)
    {
        try {
            $menuID = $request->id;
            $menu = Menu::find($menuID);
            $status = $menu->status;
            $menu->status = $status ? 0 : 1;

            $menu->save();

            return response()->json(['message' => 'Uğurlu', 'status' => $menu->status], 200);
        } catch (\Exception $exception) {
            return response()->json(['message' => 'Xəta', 'status' => $menu->status], 500);
        }
    }
}
