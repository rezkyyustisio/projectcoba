<?php

namespace App\Http\Requests\Keuangan;

use Illuminate\Foundation\Http\FormRequest;

class HutangPiutangRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => 'required|in:hutang,piutang',
            'nama' => 'required|string|max:250',
            'jumlah' => 'required|numeric|min:0',
            'tanggal' => 'required|date',
            'tanggal_jatuh_tempo' => 'required|date|after_or_equal:tanggal',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:aktif,lunas'
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'Tipe harus dipilih',
            'type.in' => 'Tipe tidak valid',
            'nama.required' => 'Nama harus diisi',
            'nama.max' => 'Nama maksimal 250 karakter',
            'jumlah.required' => 'Jumlah harus diisi',
            'jumlah.numeric' => 'Jumlah harus berupa angka',
            'jumlah.min' => 'Jumlah minimal 0',
            'tanggal.required' => 'Tanggal harus diisi',
            'tanggal.date' => 'Format tanggal tidak valid',
            'tanggal_jatuh_tempo.required' => 'Tanggal jatuh tempo harus diisi',
            'tanggal_jatuh_tempo.date' => 'Format tanggal jatuh tempo tidak valid',
            'tanggal_jatuh_tempo.after_or_equal' => 'Tanggal jatuh tempo harus setelah atau sama dengan tanggal transaksi',
            'status.required' => 'Status harus dipilih',
            'status.in' => 'Status tidak valid'
        ];
    }
}