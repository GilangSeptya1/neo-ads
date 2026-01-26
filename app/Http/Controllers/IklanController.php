<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IklanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $iklan = Iklan::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('iklan.index', compact('iklan'));
    }

    public function create()
    {
        return view('iklan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'lokasi' => 'required|string',
            'mulai' => 'required|date',
            'tujuan' => 'required|in:Brand Awareness,Promotion,Event',
            'eksposur' => 'required|numeric',
            'budget' => 'required|numeric|min:0',
        ]);

        $user = Auth::user();
        
        $iklan = new Iklan();
        $iklan->user_id = $user->id;
        $iklan->judul_iklan = $request->judul;
        $iklan->target_lokasi = $request->lokasi;
        $iklan->tanggal_mulai = $request->mulai;
        $iklan->tanggal_berakhir = $request->berakhir;
        
        // Hitung durasi jika ada tanggal berakhir
        if ($request->tanggal_berakhir) {
            $start = \Carbon\Carbon::parse($request->mulai);
            $end = \Carbon\Carbon::parse($request->berakhir);
            $iklan->durasi_hari = $end->diffInDays($start);
        }
        
        $iklan->tujuan_iklan = $request->tujuan;
        $iklan->target_eksposur_km = $request->eksposur;
        $iklan->total_budget = $request->budget;
        $iklan->status = 'Draft';
        $iklan->save();

        return redirect()->route('iklan.index')->with('success', 'Iklan berhasil dibuat!');
    }
}