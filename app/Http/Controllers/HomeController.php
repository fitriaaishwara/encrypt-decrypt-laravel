<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Helpers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()

    {
        $data = Home::all();
        return view('welcome', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName_old = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName_old);

        $masterpassword = "beautiful_system";

        $imageName = time().".txt";

        encrypt_ktp(public_path("images/".$imageName_old),$imageName);

        unlink(public_path("images/".$imageName_old));

        $home = new Home([
            'image' => $imageName
        ]);

        $home->save();

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }

    public function show($id)
    {
        $home = Home::find($id);
        $image = $home->image;
        return decrypt_ktp_print($image);

    }
}
