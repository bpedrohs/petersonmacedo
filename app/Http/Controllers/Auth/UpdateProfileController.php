<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileRequest;

class UpdateProfileController extends Controller
{
    public function update(ProfileRequest $request, $user)
    {
        $data = $request->all();

        if($request->hasFile('avatar') && $request->avatar->isValid()){
            $avatarPath = $request->avatar->store('profile');

            $data['avatar'] = config('app.url') .'storage/'. $avatarPath;
        }

        $user = User::findOrFail($user);

        $user->update($data);

        flash('Perfil atualizado com sucesso!')->success();
        return redirect()->route('admin.profile');
    }

    public function removeProfilePhoto(Request $request, $user)
    {
        $data = $request->all();

        $user = User::findOrFail($user);
        
        if ($user->avatar && Storage::exists($user->avatar)) {
            Storage::delete($user->avatar);
        }

        $avatarPath = 'images/dashboard/avatar.jpg';
        
        $data['avatar'] = config('app.url').$avatarPath;

        $user->update($data);

        flash('Foto removida!')->success();
        return redirect()->route('admin.profile');
    }
}
