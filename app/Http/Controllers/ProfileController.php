<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Penanggung_jawab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $perusahaan = Perusahaan::where('user_id', $user->id)->first();
        $penanggungjawab = Penanggung_jawab::where('user_id', $user->id)->first();

        return view('profile.index', compact('perusahaan','penanggungjawab'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'kategori_bisnis' => 'required|in:FnB,IT,Jasa,Lainnya',
            'jenis_perusahaan' => 'required|in:PT,UMKM,Korporat,Agensi,Perorangan',
            'npwp' => 'nullable|string|max:50',
            'provinsi' => 'required|string|max:100',
            'kota' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'alamat_lengkap' => 'required|string',
           // 'nama_depan_penanggungjawab' => 'required|string|max:100',
         //   'nama_belakang_penanggungjawab' => 'required|string|max:100',
           // 'email_penanggungjawab' => 'required|email|max:100', 
           // 'telepon_penanggungjawab' => 'required|string|max:20',
        ]);

        $user = Auth::user();
        
        $perusahaan = Perusahaan::where('user_id', $user->id)->first();
        
        if (!$perusahaan) {
            $perusahaan = new Perusahaan();
            $perusahaan->user_id = $user->id;
        }

        $perusahaan->fill($request->all());
        $perusahaan->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
    
    public function update1(Request $request)
    {
        $request->validate([
            'nama_depan_penanggungjawab' => 'required|string|max:100',
            'nama_belakang_penanggungjawab' => 'required|string|max:100',
            'email_penanggungjawab' => 'required|email|max:100', 
            'telepon_penanggungjawab' => 'required|string|max:20',
        ]);

        $user = Auth::user();
        
        $penanggungjawab = Penanggung_jawab::where('user_id', $user->id)->first();
        
        if (!$penanggungjawab) {
            $penanggungjawab = new Penanggung_jawab();
            $penanggungjawab->user_id = $user->id;
        }

        $penanggungjawab->fill($request->all());
        $penanggungjawab->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}