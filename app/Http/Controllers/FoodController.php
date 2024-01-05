<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::where('is_deleted', false)->get();
        return view('food_table', compact('foods'));
    }
    public function create()
    {
        $is_edit = false;
        return view('food_update', compact('is_edit'));
    }
    public function update(Food $food)
    {
        if ($food->is_deleted) {
            return redirect()->route('foods.index')->with('error', 'Makanan tidak ditemukan atau telah dihapus.');
        }
        $is_edit = true;
        return view('food_update', compact('food','is_edit'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'harga' => 'required',
        ]);
        $validatedData['created_by'] = 'admin';
        Food::create($validatedData);
        
        return redirect()->route('foods.index')->with('success', 'Makanan berhasil ditambahkan');
    }
    public function saveupdate(Request $request,Food $food)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'harga' => 'required',
        ]);
        $validatedData['updated_by'] = 'admin';
        $food->update($validatedData);
        return redirect()->route('foods.index')->with('success', 'Makanan berhasil diupdate');
    }

    public function destroy($id)
    {
        $food = Food::find($id);
            if (!$food->is_deleted) {
                $food->is_deleted = true;
                $food->save();
                return redirect()->route('foods.index')->with('success', 'Makanan berhasil dihapus.');
            }
        return redirect()->route('foods.index')->with('error', 'Makanan tidak ditemukan.');
    }


}
