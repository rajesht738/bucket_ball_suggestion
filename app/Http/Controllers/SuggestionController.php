<?php

namespace App\Http\Controllers;

use App\Models\Ball;
use App\Models\Bucket;
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
        $balls = Ball::all();
        return view('suggestions.index', compact('buckets', 'balls'));
    }
    public function suggestBuckets(Request $request)
    {

        // Retrieve the input data
        $ballCounts = [
            'Pink' => $request->input('pink_balls'),
            'Red' => $request->input('red_balls'),
            'Blue' => $request->input('blue_balls'),
            'Orange' => $request->input('orange_balls'),
            'Green' => $request->input('green_balls'),
            // Add more colors and counts as needed
        ];

        // Retrieve the list of buckets from the database
        $buckets = Bucket::all();

        // Initialize variables to track suggested buckets and remaining balls
        $suggestedBuckets = [];
        $remainingBalls = $ballCounts;

        // Sort the buckets by capacity in descending order
        $buckets = $buckets->sortByDesc('bucket_volume');

        // Iterate through the buckets to allocate balls
        foreach ($buckets as $bucket) {
            $bucketName = $bucket->bucket_name;
            $Bucketcapacity = $bucket->bucket_volume;

            $suggestedBuckets[$bucketName] = [];

            // Iterate through the ball colors to allocate balls to the current bucket
            foreach ($remainingBalls as $color => $count) {
                // Retrieve the size of the ball from the database
                $ballSize = Ball::where('ball_name', $color)->first()->ball_volume;

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
                $extraBalls[$color] = $count;
            }
        }

        // Save suggested buckets to the database
        foreach ($suggestedBuckets as $bucketName => $bucketContents) {
            foreach ($bucketContents as $color => $count) {
                SuggestedBucket::create([
                    'bucket_name' => $bucketName,
                    'color' => $color,
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

        return view('suggestions.result', compact('suggestedBuckets', 'extraBalls'));
    }
}
