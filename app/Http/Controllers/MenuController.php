<?php

namespace App\Http\Controllers;
use App\Models\Menu;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    public function create(){
        return view('menu.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_menu'=>'required',
            'harga_menu'=>'required|numeric',
            'gambar_menu'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        $imageName = null;

        if ($request->hasFile('gambar_menu')) {
            $imageName = time() . '.' . $request->gambar_menu->extension();
            $request->gambar_menu->move(public_path('images'), $imageName);
        }

        Menu::create([
            'nama_menu'=>$request->nama_menu,
            'harga_menu'=>$request->harga_menu,
            'gambar_menu'=>$imageName
        ]);

        return redirect()->route('menu.index')->with('menu sukses ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id){
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, string $id){
        $request->validate([
            'nama_menu'=>'required',
            'harga_menu'=>'required|numeric',
            'gambar_menu'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        $menu = Menu::findOrFail($id);
        $imageName = $menu->gambar_menu;

        if ($request->hasFile('gambar_menu')) {
            if ($imageName && file_exists(public_path('images/' . $imageName))) {
                unlink(public_path('images/' . $imageName));
            }

            $imageName = time() . '.' . $request->gambar_menu->extension();
            $request->gambar_menu->move(public_path('images'), $imageName);
        }
        $menu->update([
            'nama_menu'=>$request->nama_menu,
            'harga_menu'=>$request->harga_menu,
            'gambar_menu'=>$imageName
        ]);

        return redirect()->route('menu.index')->with('menu sukses diupdate');
    }

    public function destroy(string $id)
    {
        $menus = Menu::where('id', $id)->firstOrFail();
        if ($menus->gambar_menu && file_exists(public_path('images/' . $menus->gambar_menu))) {
            unlink(public_path('images/' . $menus->gambar_menu));
        }
        $menus->delete();
        return redirect()->route('menu.index')->with('produk berhasil dihapus');
    }
}
