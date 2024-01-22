<?php

namespace App\Http\Controllers;

use App\Helpers\EncryptionHelper;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\TankReport;

class HomeController extends Controller
{
    public function index()
    {
        $tanks = TankReport::where('created_at', 'like', date('Y-m-d') . '%')
            ->get();
        // dd($tanks);
        return view('home.index', [

            'tanks' => $tanks,
        ]);
    }
}
