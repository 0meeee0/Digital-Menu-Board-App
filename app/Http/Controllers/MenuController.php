<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menuList', compact('menus'));
    }

    public function create()
    {
        return view('create');
    }

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string',
        'description' => 'nullable|string',
        'ingredients' => 'nullable|string',
        'instructions' => 'nullable|string',
        'category' => 'nullable|string',
        'price' => 'required|numeric',
    ]);

    // Create a new menu record in the database
    Menu::create($validatedData);

    // Redirect to the 'menuList' route with a success message
    return redirect()->route('menus.index')->with('success', 'Menu created successfully');
}

    public function show(Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        return view('edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'ingredients' => 'nullable|string',
            'instructions' => 'nullable|string',
            'category' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        $menu->update($validatedData);

        return redirect()->route('menus.index')->with('success', 'Menu updated successfully');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully');
    }
}
