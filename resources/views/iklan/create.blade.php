@extends('layout.app')

@section('title', 'Buat Iklan Baru - NeoAds')

@section('content')
<div class="bg-white rounded-lg border border-gray-200 p-8 max-w-5xl">

    <h1 class="text-2xl font-bold text-gray-400 mb-6">
        Buat Iklan Baru
    </h1>

    <form method="POST" action="{{ route('iklan.store') }}" class="grid grid-cols-2 gap-6">
        @csrf

        {{-- Judul --}} 
        <div>
            <label class="label">Judul Iklan*</label>
            <input type="text" class="input" name="judul">
        </div>

        {{-- Tujuan --}}
        <div>
            <label class="label">Tujuan Iklan*</label>
            <input type="text" class="input" name="tujuan"
                   value="Brand Awareness/Promotion/Event">
        </div>

        {{-- Lokasi --}}
        <div>
            <label class="label">Target Lokasi Iklan*</label>
            <input type="text" class="input" name="lokasi">
        </div>

        {{-- Kendaraan --}}
        <div>
            <label class="label">Target Kendaraan*</label>
            <input type="text" class="input" name="kendaraan">
        </div>

        {{-- Eksposur --}}
        <div>
            <label class="label">Target Eksposur Tercapai (KM)*</label>
            <input type="text" class="input" name="eksposur">
        </div>

        {{-- Mulai --}}
        <div>
            <label class="label">Tanggal Iklan Dimulai*</label>
            <input type="date" class="input" name="mulai">
        </div>

        {{-- Berakhir --}}
        <div>
            <label class="label">Tanggal Iklan Berakhir</label>
            <input type="date" class="input" name="berakhir">
        </div>

        {{-- Durasi --}}
        <div>
            <label class="label">Durasi Iklan</label>
            <input type="text" disabled
                   class="input bg-gray-100"
                   value="X Hari (autocalculate)">
        </div>

        {{-- Budget --}}
        <div>
            <label class="label">Total Budget*</label>
            <input type="number" class="input" name="budget">
        </div>

        {{-- Button --}}
        <div class="col-span-2 flex justify-end mt-4">
            <button
                class="px-6 py-2 rounded-md bg-blue-900 text-white text-sm font-medium hover:bg-blue-800">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
