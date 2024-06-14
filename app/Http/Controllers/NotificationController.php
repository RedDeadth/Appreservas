<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::orderBy('id', 'desc')->get();
        $total = Notification::count();
        return view('admin.notification.home', compact(['notifications', 'total']));
    }

    public function create()
    {
        return view('admin.notification.create');
    }
    public function save(Request $request)
    {
        $validation = $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'flight_id' => 'required',
            'start_date'=> 'required',
            'end_date'=> 'required',
        ]);
        $data = Notification::create($validation);
        if ($data) {
            session()->flash('success', 'Notificacion hecha');
            return redirect(route('admin/notifications'));
        } else {
            session()->flash('error', 'Aqui hay gato encerrado');
            return redirect(route('admin.notifications/create'));
        }
    }
}
