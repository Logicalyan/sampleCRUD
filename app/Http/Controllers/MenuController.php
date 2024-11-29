<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'menu_name'     => 'required|string|min:5',
            'price'     => 'required|decimal:2',
            'deskripsi'     => 'required',
            'image_menu'     => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        //upload image
        $image = $request->file('image_menu');
        $image->storeAs('public/menus', $image->hashName());

        //create post
        Menu::create([
            'menu_name'     => $request->menu_name,
            'price'   => $request->price,
            'deskripsi'     => $request->deskripsi,
            'image_menu'     => $image->hashName(),
        ]);

        //redirect to index
        return redirect()->route('menus.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);

        return redirect()->route('menus.index');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'menu_name'     => 'required|string|min:5',
            'price'     => 'required|decimal:2',
            'deskripsi'     => 'required',
            'image_menu'     => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $menu = Menu::findOrFail($id);

        if(request()->hasFile('image_menu')){

            $image = $request->file('image_menu');
            $image->storeAs('public/menus', $image->hashName());

            Storage::delete('public/menus/'.$menu->image_menu);

            $menu->update([
            'menu_name'     => $request->menu_name,
            'price'         => $request->price,
            'deskripsi'     => $request->deskripsi,
            'image_menu'    => $image->hashName(),
            ]);
        } else {
            $menu->update([
            'menu_name'     => $request->menu_name,
            'price'         => $request->price,
            'deskripsi'     => $request->deskripsi,
            ]);
        }

        //redirect to index
        return redirect()->back()->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        //delete image
        Storage::delete('public/menus/'. $menu->image);

        //delete menu
        $menu->delete();

        //redirect to index
        return redirect()->route('menus.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
