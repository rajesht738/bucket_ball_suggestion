<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::all();
        //  dd($students);
        return view('ball_color.index', ['colors' => $colors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ball_color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'color_name' => 'required',
             ]);
        $Color = new Color();
        $Color->color_name = $request->color_name;
        $Color->save();
        return back()->with('success', 'Color Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

  /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $color = Color::where('id', $id)->first();

        return view('ball_color.edit', ['color' => $color]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // dd($id);
         $request->validate([
            'color_name' => 'required',
            
          ]);
        $color = Color::where('id', $id)->first();
     
        $color->color_name = $request->color_name;
       
        $color->save();
        return back()->with('success', 'Color Updated Successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color = Color::where('id', $id)->first();
        $color->delete();
        return back()->with('success', 'Color Deleted Successfully!!!');
    }
}
