<?php

namespace App\Http\Controllers;

use App\Models\Bucket;
use Illuminate\Http\Request;

class BucketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buckets = Bucket::all();
        //  dd($students);
        return view('bucket.index', ['buckets' => $buckets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bucket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bucket_name' => 'required',
            'bucket_volume' => 'required',
          ]);

        // dd($request->toArray());
        $bucket = new Bucket();
        $bucket->bucket_name = $request->bucket_name;
        $bucket->bucket_volume = $request->bucket_volume;
         $bucket->save();
        return back()->with('success', 'Bucket Added Successfully');
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
        $bucket = Bucket::where('id', $id)->first();

        return view('bucket.edit', ['bucket' => $bucket]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // dd($id);
         $request->validate([
            'bucket_name' => 'required',
            'bucket_volume' => 'required',
          ]);
        $bucket = Bucket::where('id', $id)->first();
     
        $bucket->bucket_name = $request->bucket_name;
        $bucket->bucket_volume = $request->bucket_volume;
        $bucket->save();
        return back()->with('success', 'Bucket Updated Successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bucket = Bucket::where('id', $id)->first();
        $bucket->delete();
        return back()->with('success', 'Bucket Deleted Successfully!!!');
    }
}
