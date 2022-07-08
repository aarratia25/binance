<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Traits\UploadImage;
use Carbon\Carbon;
use App\Models\User;
use App\Models\EventUser;
class HomeController extends Controller
{
    use UploadImage;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function landing()
    {
        $events = null;

        $plans = Plan::all();

        if(auth()->check()) {
            $events = EventUser::orderBy('id', 'desc')->where('user_id', auth()->user()->id)->whereDate('date', '=', date('Y-m-d'))->get();
        }

        return view('landing', compact('plans', 'events'));
    }

    public function index()
    {
        if(auth()->user()->complete == 1) {
            return redirect()->route('complete');
        }

        $planes = Plan::all();

        return view('home', compact('planes'));
    }

    public function complete()
    {
        return view('complete');
    }

    public function completeProfile(Request $request)
    {
        $this->validate($request, [
            'qr' => 'mimes:jpeg,bmp,png,gif,svg,pdf',
            'network' => 'required',
            'wallet' => 'required',
        ]);

        $input = [
            'network' => $request->network,
            'wallet' => $request->wallet,
            'complete' => 2,
        ];

        if($request->hasFile('qr')) {
            $filename = $this->uploadImage($request->file('qr'), 'qrs');
            $input['qr'] = $filename;
        }

        auth()->user()->update($input);

        return redirect()->route('home');
    }

    public function plan($id)
    {
        if(auth()->user()->complete == 1) {
            return redirect()->route('complete');
        }

        $plan = Plan::findOrFail($id);

        return view('plan', compact('plan'));
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf',
            'amount' => 'required',
        ]);

        $filename = $this->uploadImage($request->file('image'), 'screenshots');

        Transaction::updateOrCreate(['user_id' => auth()->id()], [
            'amount' => $request->amount,
            'plan_id' => $id,
            'user_id' => auth()->id(),
            'screenshot' => $filename,
            'complete' => 1
        ]);

        return back()->with('status', 'Se envio la transacción, espere que el administrador la apruebe.');
    }

    public function transactions()
    {
        $transactions = Transaction::all();

        return view('transactions', compact('transactions'));
    }

    public function activeTransaction($id)
    {
        $transaction = Transaction::find($id);

        $user = User::find($transaction->user_id);

        $user->update(['plan_id' => $transaction->plan_id, 'complete' => 1]);

        return back()->with('status', 'Usuario aprobado correctamente.');
    }

    public function click()
    {
        $event = EventUser::where('user_id', auth()->id())->whereDate('date', '=', date('Y-m-d'))->count();

        if($event == 5){
            return back()->with('status', 'No puedes hacer mas de 5 clicks por dia.');
        }

        $planId = auth()->user()->plan_id;

        EventUser::create([
            'user_id' => auth()->id(),
            'plan_id' => $planId,
            'click' => Carbon::now()->addMinutes($this->getClickByPlan($planId)),
            'date' => date('Y-m-d'),
        ]);

        return back()->with('status', 'Click realizado correctamente.');
    }

    public function getClickByPlan($planId)
    {
        $plan = Plan::find($planId);

        return $plan->time;
    }

    public function profile()
    {
        $user = User::find(auth()->id());

        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $input = $request->all();

        $input['password'] = bcrypt($request->password);

        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'confirmed',
        ]);

        $user = User::find($id);

        $user->update($input);

        return back()->with('status', 'Click realizado correctamente.');
    }

    public function events()
    {
        $events = EventUser::with(['user', 'plan'])->get();

        return view('events', compact('events'));
    }
}
