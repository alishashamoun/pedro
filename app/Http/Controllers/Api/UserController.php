<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Questions;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $ques = Questions::all();
        $job = Job::where('customer_id', $user->id)->orderby('updated_at', 'desc')->get();
        // dd($user);
        return response()->json([
            'ques' => $ques,
            'job' => $job,
        ]);
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
        return response()->json($job, 200);
    }
}
