<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Consultation;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    //

    public function index()
    {
        $users = User::role('کاربر عادی')->paginate(10);
        $reservations = Reservation::all();
        return view('admin.index', compact('users', 'reservations'));
    }


    public function general()
    {
        return view('admin.settings.general');
    }
}
