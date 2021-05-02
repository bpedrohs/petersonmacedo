<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectPhoto;
use Illuminate\Support\Facades\Storage;

class ProjectPhotoController extends Controller
{
    public function removePhoto(Request $request)
    {
        $photoName = $request->get('photoName');

        if (Storage::disk('public')->exists($photoName)) {
            Storage::disk('public')->delete($photoName);
        }

        $removePhoto = ProjectPhoto::where('photo', '=' ,$photoName);
        $removePhoto->delete();

        return back();
    }
}
