<?php

namespace App\Http\Controllers;

use App\Models\Ball;
use App\Models\Bucket;
use App\Models\Color;
use App\Models\ExtraBall;
use App\Models\SuggestedBucket;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buckets = Bucket::all();
        $balls = Ball::with(['color'])->get();
        $res = SuggestedBucket::with(['ball', 'bucket'])->get();
       
        // dd($res->toArray());
        return view('suggestions.index', compact('buckets', 'res', 'balls'));
    }
    public function suggestBuckets(Request $request)
    {
        // dd($request->toArray());
        // Retrieve the input data
        $ballCounts = [];
        $counts = $request->input('balls_count');
        $ball_ids = $request->input('balls_id');


        // Process and save the data
        foreach ($counts as $index => $color) {
            $ball_id = $ball_ids[$index];
            $ballCounts[$ball_id] = $color;
        }

        // Retrieve the list of buckets from the database
        $buckets = Bucket::all();

        // Initialize variables to track suggested buckets and remaining balls
        $suggestedBuckets = [];
        $remainingBalls = $ballCounts;

        // Sort the buckets by capacity in descending order
        $buckets = $buckets->sortByDesc('bucket_volume');

        // Iterate through the buckets to allocate balls
        foreach ($buckets as $bucket) {
            $bucketName = $bucket->id;
            $Bucketcapacity = $bucket->bucket_volume;

            $suggestedBuckets[$bucketName] = [];

            // Iterate through the ball colors to allocate balls to the current bucket
            foreach ($remainingBalls as $color => $count) {

                // Retrieve the size of the ball from the database
                $ballSize = Ball::where('color_id', $color)->first()->ball_volume;

                $ballsToAdd = min($count, floor($Bucketcapacity / $ballSize));

                if ($ballsToAdd > 0) {
                    $suggestedBuckets[$bucketName][$color] = $ballsToAdd;
                    $remainingBalls[$color] -= $ballsToAdd;
                    $Bucketcapacity -= $ballsToAdd * $ballSize;
                }
            }
        }

        // Check for any remaining balls
        $extraBalls = [];
        foreach ($remainingBalls as $color => $count) {

            if ($count > 0) {
                $color_name = Color::select('color_name')->where('id', $color)->first();
                $color_name= $color_name->color_name;
                $extraBalls[$color_name] = $count;
            }
        }
        // Clear suggested buckets to the database
        SuggestedBucket::truncate();
        // Clear extra balls to the database
        ExtraBall::truncate();

        // Save suggested buckets to the database
        foreach ($suggestedBuckets as $bucketName => $bucketContents) {
            foreach ($bucketContents as $color => $count) {
                SuggestedBucket::create([
                    'bucket_id' => $bucketName,
                    'ball_id' => $color,
                    'count' => $count,
                ]);
            }
        }
        // Save extra balls to the database
        foreach ($extraBalls as $color => $count) {
            ExtraBall::create([
                'color' => $color,
                'count' => $count,
            ]);
        }
       
        $res = SuggestedBucket::with(['ball', 'bucket'])->get();
// dd($res->toArray());
        return view('suggestions.result', compact('suggestedBuckets', 'extraBalls','res'));
    }
}
