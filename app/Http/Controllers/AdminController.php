<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sewa;

class AdminController extends Controller
{
    public function showUsers(Request $request)
    {
        $keyword = $request->keyword;

        if ($keyword) {
            $users = User::where('role', 'user')
                ->where('name', 'like', "%{$keyword}%")
                ->get();
        } else {
            $users = User::where('role', 'user')->get();
        }

        return view('admin.userbyadmin', compact('users'));
    }

   public function showSewa(Request $request)
    {
        $keyword = $request->keyword;

        if ($keyword) {
            $sewas = Sewa::with('user', 'produk')
                ->whereHas('user', function ($query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%");
                })
                ->orWhereHas('produk', function ($query) use ($keyword) {
                    $query->where('nama', 'like', "%{$keyword}%");
                })
                ->get();
        } else {
            $sewas = Sewa::with('user', 'produk')->get();
        }

        return view('admin.sewa', compact('sewas'));
    }


    public function updateStatusSewa(Request $request, $id)
    {
        // Pastikan value yang dikirim sesuai
        $request->validate([
            'status' => 'required|in:order,pickup,done'
        ]);

        $sewa = Sewa::findOrFail($id);
        $sewa->status = $request->status;
        $sewa->save();

        return redirect()->back()->with('success', 'Status berhasil diupdate');
    }


}
