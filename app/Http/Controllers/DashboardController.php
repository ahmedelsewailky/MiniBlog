<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Setting;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::take(3)->get();
        $posts = Post::latest()->get();
        $setting = Setting::all()->first();
        $record = Post::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->groupBy('day_name', 'day')
        ->orderBy('day')
        ->get();
        $data = [];
        foreach ($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }
        $data['chart_data'] = json_encode($data);
        return view('dashboard.index', compact(['users', 'posts', 'setting', 'data']));
    }


    public function subscribers()
    {
        $subscribers = Subscribers::orderBy('created_at', 'DESC')->paginate(10);
        return view('dashboard.subscribers.index', compact('subscribers'));
    }

    public function addSubscriber(Request $request)
    {
        $request->validate([
            'email' => 'email|required|unique:subscribers,email'
        ]);
        Subscribers::create([
            'email' => $request->email
        ]);
        return redirect()->route('website')->with('success', 'Done!');
    }
}
