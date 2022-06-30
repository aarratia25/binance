<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Traits\UploadImage;
class HomeController extends Controller
{
    use UploadImage;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
        ]);

        $filename = $this->uploadImage($request->file('image'), 'screenshots');

        Transaction::updateOrCreate(['user_id' => auth()->id()], [
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
}
