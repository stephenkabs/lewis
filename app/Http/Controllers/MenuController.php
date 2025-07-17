<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Show all menu items (hierarchically)
    public function index()
    {
        $menus = Menu::whereNull('parent_id')->with('children.children')->orderBy('order')->get();
        return view('menus.index', compact('menus'));
    }

    // Show form to create new menu
    public function create()
    {
        $menus = Menu::all(); // used for parent selection
        return view('menus.create', compact('menus'));
    }

    // Save new menu item
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
            'order' => 'nullable|integer',
        ]);

        Menu::create($request->only(['title', 'url', 'parent_id', 'order']));

        return redirect()->route('menus.index')->with('success', 'Menu item created successfully.');
    }

    // Show form to edit a menu item
    public function edit(Menu $menu)
    {
        $menus = Menu::where('id', '!=', $menu->id)->get(); // exclude self to avoid loop
        return view('menus.edit', compact('menu', 'menus'));
    }

    // Update existing menu item
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
            'order' => 'nullable|integer',
        ]);

        $menu->update($request->only(['title', 'url', 'parent_id', 'order']));

        return redirect()->route('menus.index')->with('success', 'Menu item updated successfully.');
    }

    // Delete a menu item
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu item deleted successfully.');
    }
}
