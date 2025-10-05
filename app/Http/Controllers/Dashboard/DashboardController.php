<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('dashboard.dashboard', [
            'user' => $user,
        ]);
    }

   public function updateProfile(Request $request) {
    $data = $request->validate([
        'full_name'     => ['required','string','max:255'],
        'occupation'    => ['nullable','string','max:255'],
        'company_name'  => ['nullable','string','max:255'],
        'phone'         => ['nullable','string','size:11'], // size بدل min/max
        'address'       => ['nullable','string','max:255'],
        'city'          => ['nullable','string','max:255'],
        'linkedin'      => ['nullable','string','max:255'],
        'facebook'      => ['nullable','string','max:255'],
        'twitter'       => ['nullable','string','max:255'],
        'instagram'     => ['nullable','string','max:255'],
    ]);

    $user = Auth::user();
    $user->profile->update($data);

    return redirect()->route('dashboard')->with('success', 'Your data updated successfully');
    }
}
