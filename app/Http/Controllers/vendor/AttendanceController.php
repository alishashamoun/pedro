<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\JobLocation;
use App\Models\ManagerAttendance;
use App\Models\User;
use App\Models\WorkOrders;
use App\Notifications\UserNotification;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('map');
    }
    public function getTodayAttendance()
    {
        $today = now()->toDateString();
        $attendanceToday = ManagerAttendance::where('user_id', auth()->user()->id)->whereDate('created_at', $today)
            ->latest()
            ->first()
            ->attendance ?? null;

        return response()->json(['attendance' => $attendanceToday]);
    }
    public function attendance($id)
    {
        $attendance = Attendance::where('work_orders_id', $id)->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('vendor.attendance.index', compact('id', 'attendance'));
    }
    public function Vendorattendance()
    {
        $attendance = Attendance::orderBy('created_at', 'desc')->get();
        return view('admin.attendance.vendor', compact('attendance'));
    }
    public function Managerattendance()
    {
        if (Auth::user()->hasRole('Admin')) {

            $attendance = ManagerAttendance::orderBy('created_at', 'desc')->get();
        } else {

            $attendance = ManagerAttendance::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }
        return view('admin.attendance.index', compact('attendance'));
    }
    public function apitest()
    {
        $user = auth()->user();
        // return $user;
        // $roles = $user->token()->scopes['roles'];
        // return response()->json($user->currentAccessToken()->abilities['roles'][0]);



        if ($user->tokenCan('Admin')) {
            return response()->json('Admin');

        }
        return response()->json('notAdmin', 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // return response()->json(['token' => $request->email]);
        $credentials = $request->only('email', 'password');
        // return $credentials;
        if (Auth::attempt($credentials)) {

            $user = auth()->user();
            $roles = $user->getRoleNames()->toArray();
            // return $roles[0];
            $token = $user->createToken('authToken', [$roles[0]])->plainTextToken;

            return response()->json(['token' => $token, 'success' => true], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stores(Request $request)
    {

        $data = $request->all();

        dd($data);
        $client = new Client();

        $response = $client->get('https://api.opencagedata.com/geocode/v1/json', [
            'query' => [
                'key' => 'ab5facf267b84f5ba20bace2281864a1',
                'q' => "{$data['latitude']},{$data['longitude']}",
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        if ($data['total_results'] > 0) {
            return $data['results'][0]['formatted'];
        }

        return [
            'success' => false,
            'message' => 'No location found for the provided coordinates.',
        ];
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function attendanceStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'job' => 'required|exists:work_orders,id',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'address' => 'required|string',
        ]);

        $job = JobLocation::where('work_orders_id', $request->job)->first();
        $userLat = $request->latitude; // User's latitude
        $userLon = $request->longitude;

        $jobLat = $job->latitude;
        $jobLon = $job->longitude;

        $thresholdDistance = 30;

        $distance = $this->calculateDistance($userLat, $userLon, $jobLat, $jobLon);

        if ($distance <= $thresholdDistance) {
            $checkIn = Attendance::where('user_id', Auth::User()->id)
                ->where('work_orders_id', $request->job)
                ->where('attendance', 'checkIn')
                ->first();
            if ($checkIn) {
                $attendanceStatus = 'checkOut';

                $startDate = $checkIn->created_at;
                $endDate = Carbon::now();

                $diffInTime = $startDate->diff($endDate)->format('%H:%I:%S');
                // dd($diffInTime);
                $time = $diffInTime;
            } else {
                $time = '';
                $attendanceStatus = 'checkIn';

            }
            Attendance::create([
                "user_id" => Auth::User()->id,
                "address" => $request->address,
                "work_orders_id" => $request->job,
                "attendance" => $attendanceStatus,
                "duration" => $time,
            ]);

            return response()->json([
                'success' => true,
                'distance' => $distance,
                'message' => 'Attendance marked: User is within 30 meters.',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'distance' => $distance,
                'message' => 'Attendance not marked: User is outside 30 meters.',
            ]);
        }
    }
    public function managerStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // 'job' => 'required|exists:work_orders,id',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'address' => 'required|string',
        ]);

        $today = Carbon::today();
        $checkIn = ManagerAttendance::where('user_id', Auth::id())
            ->where('attendance', 'checkIn')
            ->whereDate('created_at', $today)
            ->first();
        if ($checkIn) {

            $startDate = $checkIn->created_at;
            $endDate = Carbon::now();

            $diffInTime = $startDate->diff($endDate)->format('%H:%I:%S');
            $time = $diffInTime;
        } else {
            $time = '';

        }
        $attendance = ManagerAttendance::create([
            "user_id" => Auth::User()->id,
            "address" => $request->address,
            "attendance" => $request->attendance,
            "duration" => $time,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Attendance marked.',
            'attendance' => $attendance,
        ]);

    }
    public function store(Request $request)
    {
        dd($request->all());
        $userLat = $request->latitude; // User's latitude
        $userLon = $request->longitude;

        $jobLat = $request->Joblatitude;
        $jobLon = $request->Joblongitude;

        $thresholdDistance = 30;

        $distance = $this->calculateDistance($userLat, $userLon, $jobLat, $jobLon);

        if ($distance <= $thresholdDistance) {
            $attendanceStatus = 'present';

            return [
                'success' => true,
                'distance' => $distance,
                'message' => 'Attendance marked: User is within 30 meters.',
            ];
        } else {
            return [
                'success' => false,
                'distance' => $distance,
                'message' => 'Attendance not marked: User is outside 30 meters.',
            ];
        }
    }
    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $R = 6371e3;
        $φ1 = deg2rad($lat1);
        $φ2 = deg2rad($lat2);
        $Δφ = deg2rad($lat2 - $lat1);
        $Δλ = deg2rad($lon2 - $lon1);

        $a = sin($Δφ / 2) * sin($Δφ / 2) +
            cos($φ1) * cos($φ2) *
            sin($Δλ / 2) * sin($Δλ / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $R * $c;
        return $distance;
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
        // dd($request->all(), $id);
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Create or update the job location record
        JobLocation::updateOrCreate(
            ['work_orders_id' => $id],
            [
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]
        );
        $work = WorkOrders::find($id);

        $admin = User::find(1);
        $user = auth()->user();
        $message = "submitted location of job# {$work->job_id} Work-order# {$work->id}. ";

        $vendor = User::find($work->vendor_id);
        $vendor->notify(new UserNotification($user, $message));
        $admin->notify(new UserNotification($user, $message));

        // Return a response
        return response()->json(['message' => 'Location saved successfully']);
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
