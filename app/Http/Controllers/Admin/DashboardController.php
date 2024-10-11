<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estimate;
use App\Models\Inventory;
use App\Models\Invoice;
use App\Models\Job;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\GameDeposit;
use App\Models\GameWithdraw;
use App\Models\Redeem;
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
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $data['inventory'] = Inventory::all()->count();
        $data['job'] = Job::all()->count();
        $data['estimate'] = Estimate::all()->count();
        $data['invoice'] = Invoice::where('status', 'paid')->avg('amount');
        return view('admin.dashboard',$data);
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
        ]);

        $input = $request->all();

        $user = User::find($id);
        $user->update($input);

        session::flash('success','Record Updated Successfully');
        return redirect()->back();

    }

    public function change_password()
    {
        return view('auth.change-password');
    }
    public function store_change_password(Request $request)
    {
        $user = Auth::user();
        $userPassword = $user->password;

        $validator =Validator::make($request->all(),[
          'oldpassword' => 'required',
          'newpassword' => 'required|same:password_confirmation|min:6',
          'password_confirmation' => 'required',
        ]);

        if(Hash::check($request->oldpassword, $userPassword))
        {
            return back()->with(['error'=>'Old password not match']);
        }

        $user->password = Hash::make($request->newpassword);
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");
    }


    //      Wallet Customer User List:-
    public function walletUserList(){
        $users =User::with('wallet')->where('role',3)->get();
        return view('admin.wallet.wallet_user_list',["users"=>$users]);
     }

     public function walletdeposit($id){
         $users = User::findOrFail($id);
         return view('admin.wallet.deposit',["users"=>$users]);
     }

     public function createdeposite(Request $request){

        // dd($request->all());
         $id =$request->user_id;
            $deposit_amount=$request->dep_amount;
            $users =User::where('id',$id)->first();
            $users->deposit($deposit_amount);


            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
                    "amount" => $request->dep_amount,
                    "currency" => "USD",
                    "source" => $request->stripeToken,
                    "description" => "This payment is testing purpose of techsolutionstuff",
            ]);


            // dd($users);
         return redirect()->back()->with('success','Wallet Amount Deposit Has been submitted successfully');
     }

     public function walletwithdraw($id){
         $users = User::findOrFail($id);
         return view('admin.wallet.withdraw',["users"=>$users]);
     }
     public function createdewithdraw(Request $req){
         $id =$req->user_id;
         $withdraw_amount=$req->drw_amount;
         $users =User::where('id',$id)->first();
         $users->forceWithdraw($withdraw_amount);
         return redirect()->back()->with('success',' Withdraw Amount wallet Has been detected Successfully');
     }
}
