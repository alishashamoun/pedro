<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Job;
use App\Models\Questions;
use App\Models\Rating;
use App\Models\User;
use App\Models\WorkOrders;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class userJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $ques = Questions::all();
        $job = Job::where('customer_id', $user->id)->orderby('updated_at', 'desc')->get();
        // dd($user);
        return view('users.job.index', compact('job', 'ques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $job = Job::findOrFail($id);
        return view('users.job.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($userid);
        $request->validate([
            'ratings' => 'required|array',
            'ratings.*' => 'required|numeric|min:0|max:10',
            'comment' => 'nullable|string',
            'file' => 'nullable|file',
        ]);

        DB::beginTransaction();

        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = $file->getClientOriginalName() . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('feedback', $fileName, 'public');
            }

            $userid = WorkOrders::where('job_id', $id)->select('vendor_id')->first();

            $totalRating = 0;
            $totalQuestions = 0;
            // Loop through the ratings
            foreach ($request->ratings as $questionId => $rating) {
                // Find the question by ID
                $question = Questions::find($questionId);

                // Check if the question exists
                if ($question) {
                    // Create a new rating record
                    $ratingRecord = new Rating;
                    $ratingRecord->question_id = $questionId;
                    $ratingRecord->user_id = $userid->vendor_id;
                    $ratingRecord->job_id = $id;
                    $ratingRecord->rating = $rating;
                    $ratingRecord->save();

                    // Increment total rating and total questions
                    $totalRating += $rating;
                    $totalQuestions++;
                }
            }
            // Calculate average rating
            $averageRating = $totalQuestions > 0 ? $totalRating / $totalQuestions : 0;

            $feed = Feedback::create([
                'job_id' => $id,
                'rating' => $averageRating,
                'comment' => $request->comment,
                'file' => $path ?? null, // Set to null if no file is uploaded
            ]);


            $admin = User::find(1);
            $user = auth()->user();
            $message = "submitted a feedback report# {$feed->id}";
            $admin->notify(new UserNotification($user, $message));

            DB::commit();

            return redirect()->back()->with('success', 'Thanks For Your Feedback');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return redirect()->back()->with('error', 'An error occurred while saving your feedback.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
