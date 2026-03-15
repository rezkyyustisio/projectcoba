<?php

namespace App\Http\Requests\Keuangan;

use Illuminate\Foundation\Http\FormRequest;

class FakturRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nomor_faktur' => 'nullable|string|max:200',
            'judul' => 'required|string|max:250',
            'tanggal' => 'required|date',
            'tanggal_jatuh_tempo' => 'required|date|after_or_equal:tanggal',
            'tipe_pembayaran' => 'required|string|max:100',
            'nama_perusahaan' => 'required|string|max:250',
            'logo_perusahaan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'alamat_perusahaan' => 'required|string',
            'penerima_faktur' => 'required|string|max:250',
            'alamat_penerima' => 'required|string',
            'items' => 'required|array|min:1',
            'items.*.nama_item' => 'required|string|max:250',
            'items.*.jumlah' => 'required|numeric|min:1',
            'items.*.nominal' => 'required|numeric|min:0'
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul faktur harus diisi',
            'tanggal.required' => 'Tanggal faktur harus diisi',
            'tanggal_jatuh_tempo.required' => 'Tanggal jatuh tempo harus diisi',
            'tanggal_jatuh_tempo.after_or_equal' => 'Tanggal jatuh tempo harus setelah atau sama dengan tanggal faktur',
            'tipe_pembayaran.required' => 'Tipe pembayaran harus diisi',
            'nama_perusahaan.required' => 'Nama perusahaan harus diisi',
            'logo_perusahaan.image' => 'Logo harus berupa gambar',
            'logo_perusahaan.mimes' => 'Logo harus berformat jpeg, png, atau jpg',
            'logo_perusahaan.max' => 'Logo maksimal 2MB',
            'alamat_perusahaan.required' => 'Alamat perusahaan harus diisi',
            'penerima_faktur.required' => 'Penerima faktur harus diisi',
            'alamat_penerima.required' => 'Alamat penerima harus diisi',
            'items.required' => 'Minimal 1 item harus diisi',
            'items.min' => 'Minimal 1 item harus diisi',
            'items.*.nama_item.required' => 'Nama item harus diisi',
            'items.*.jumlah.required' => 'Jumlah item harus diisi',
            'items.*.jumlah.min' => 'Jumlah minimal 1',
            'items.*.nominal.required' => 'Nominal harus diisi',
            'items.*.nominal.min' => 'Nominal minimal 0'
        ];
    }
}