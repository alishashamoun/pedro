<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\InspectionResponse;
use App\Models\Invoice;
use App\Models\Job;
use App\Models\ProblemReporting;
use App\Models\WorkOrders;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Session;
use Stripe;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user()->id;
        $data['services'] = Job::where('customer_id', $user)->where('current_status', '2')->count();
        $data['orders'] = WorkOrders::whereHas('jobname', function ($query) use ($user) {
            $query->where('customer_id', $user);
        })->count();

        $data['estimates'] = Job::where('user_id', $user)
            ->whereHas('estimate', function ($query) {
                $query->whereColumn('estimates.id', 'jobs.estimate_id');
            })->count();

        $data['invoices'] = Invoice::whereHas('job', function ($query) use ($user) {
            $query->where('user_id', $user);
        })->count();

        return view('users.dashboard', $data);
    }

    public function profile()
    {
        return view('users.profile');
    }


    //Problem's Functions
    public function problem()
    {
        $problemReports = ProblemReporting::whereHas('jobname', function ($q) {
            $q->where('customer_id', auth()->user()->id);
        })->get();
        return view('users.report.problem', compact('problemReports'));
    }
    public function problemshow($id)
    {
        $problemReport = ProblemReporting::findOrFail($id);
        return view('users.report.problemshow', compact('problemReport'));
    }

    //Inspection's Functions
    public function inspection()
    {
        $show = Job::where('customer_id', auth()->user()->id)->with('inspectionChecklists', 'inspectionResponse')->get();
        return view('users.report.inspection', compact('show'));
    }
    public function inspectionshow($id)
    {
        $response = InspectionResponse::with('checklistItem', 'checklistItem.inspectionChecklist')->where('location_id', $id)->get();
        return view('users.report.inspectionshow', compact('response'));
    }



    public function UserProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;

        $this->validate($request, [
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'email' => 'nullable',
        ]);

        $password = Hash::make($request->password);

        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = isset($password) ? $password : $user->password;
        $user->save();

        session::flash('success', 'profile Updated Successfully');
        return redirect()->back();

    }



    public function user_edit_profile(Request $request)
    {
// dd($request->phone);
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->name = $request->name;
        // $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        session::flash('success', 'profile Updated Successfully');
        return redirect()->back();

    }


    public function users_change_password()
    {
        return view('users.change-password');
    }
    public function users_store_change_password(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $userPassword = $user->password;

        $validator = Validator::make($request->all(), [
            'oldpassword' => 'required',
            'newpassword' => 'required|same:password_confirmation|min:6',
            'password_confirmation' => 'required',
        ]);

        if (!Hash::check($request->oldpassword, $userPassword)) {
            return back()->with(['error' => 'old password not match']);
        }

        $user->password = Hash::make($request->newpassword);
        $user->save();

        return redirect()->back()->with("success", "Password changed successfully!");
    }

}
