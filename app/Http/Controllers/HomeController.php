<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\UserNotification;
use App\Services\TwilioService;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\VeriantSize;
use App\Models\PageCategory;
use App\Models\PageSections;
use App\Models\VeriantColor;
use Illuminate\Support\Facades\Storage;
use Session;
use Twilio\Rest\Client;

class HomeController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }
    public function index()
    {

        return view('home');

    }
    public function allNotification()
    {

        return view('notification');

    }
    public function markasread($id)
    {

        if ($id) {
            auth()->user()->notifications->where('id', $id)->markasread();
            return back()->with('success', 'Mark as read');
        }

    }
    public function test()
    {
        $to = '+923472783689';
        $message = 'Hello';

        //$this->twilioService->sendSMS($to, $message);

        return "done";


    }
    public function lang($lang)
    {
        // dd($lang);
        if (in_array($lang, ['en', 'es'])) {
            // app()->setLocale($lang);
            Session::put('lang', $lang);
        }
        return redirect()->back()->with('success', __('flash-messages/index.lang_change'));


    }

    public function login()
    {
        // $this->middleware('auth')->except('logout');
        return view('auth.login');
    }
    public function manager()
    {
        $data['users'] = User::all()->count();
        return view('manager.dashboard', $data);
    }


}
