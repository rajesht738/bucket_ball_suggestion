<?php

namespace App\Http\Controllers;

use App\Models\Ball;
use App\Models\Color;
use Illuminate\Http\Request;

class BallController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $balls = Ball::with('color')->get();
        //   dd($balls->toArray());
        return view('ball.index', ['balls' => $balls]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors = Color::all();
        return view('ball.create' , ['colors' => $colors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'color_id' => 'required',
            
            'ball_volume' => 'required',
          ]);

        //  dd($request->toArray());
        $ball = new Ball();
        $ball->color_id = $request->color_id;
       
        $ball->ball_volume = $request->ball_volume;
        $ball->save();
        return back()->with('success', 'Ball Added Successfully');
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
        $ball = Ball::where('id', $id)->first();

        return view('ball.edit', ['ball' => $ball]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // dd($id);
         $request->validate([
            'color_id' => 'required',
            'ball_volume' => 'required',
          ]);
        $ball = Ball::where('id', $id)->first();
     
        $ball->color_id = $request->color_id;

        $ball->ball_volume = $request->ball_volume;
        $ball->save();
        return back()->with('success', 'Ball Updated Successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ball = Ball::where('id', $id)->first();
        $ball->delete();
        return back()->with('success', 'Ball Deleted Successfully!!!');
    }
}
