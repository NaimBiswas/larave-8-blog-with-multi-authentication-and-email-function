<?php

namespace App\Http\Controllers\Author;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AuSettingController extends Controller
{
    public function index()
    {
        return view('author.setting.index');
    }
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $this->validate($request, [
            'images' => 'max:2048',
        ]);

        if ($request->name) {
            $this->validate($request, [
                'name' => ' max:20',
            ]);

            $user->name = $request->name;
        }
        if ($request->email) {

            $user->email = $request->email;
        }
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $fileName = time() . '.' . $request->images->extension();
            $imagePath = "storage/users/$user->images";
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $image->move(public_path('storage/users/'), $fileName);
            $user->images = $fileName;
        }
        $user->update();
        return back()->with('success', 'Profile Updated Success');
    }
    public function passupdate(Request $request, $id)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required|min:6',
            'comfirm_password' => 'same:password',
        ]);
        $userpass = User::findOrFail($id);

        $hashedPassowrd = $userpass->password;
        if (Hash::check($request->oldpassword, $hashedPassowrd)) {

            if (!Hash::check($request->password, $hashedPassowrd)) {
                $userpass->password = Hash::make($request->password);
                $userpass->update();
            } else {
                return back()->with('warning', "Your Old And New Password Can't be Same");
            }
        } else {
            return back()->with('warning', 'Enter Right Password! Passowrd Not Match');
        }
        return back()->with('success', 'Password Changed Success');
    }
}
