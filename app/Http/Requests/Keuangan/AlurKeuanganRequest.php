<?php

namespace App\Http\Requests\Keuangan;

use Illuminate\Foundation\Http\FormRequest;

class AlurKeuanganRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'nama_kegiatan' => 'required|string|max:250',
            'status' => 'required|in:pemasukan,pengeluaran',
            'nominal' => 'required|numeric|min:0',
            'tanggal_transaksi' => 'required|date',
            'status_pembayaran' => 'required|in:terbayar,belum_dibayar,ditunda',
            'deskripsi' => 'nullable|string',
        ];

        // Rule untuk file saat create
        if (!$this->id) {
            $rules['file'] = 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048';
        } else {
            // Rule untuk file saat update
            $rules['file'] = 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'nama_kegiatan.required' => 'Nama kegiatan harus diisi',
            'nama_kegiatan.max' => 'Nama kegiatan maksimal 250 karakter',
            'status.required' => 'Status harus dipilih',
            'status.in' => 'Status tidak valid',
            'nominal.required' => 'Nominal harus diisi',
            'nominal.numeric' => 'Nominal harus berupa angka',
            'nominal.min' => 'Nominal minimal 0',
            'tanggal_transaksi.required' => 'Tanggal transaksi harus diisi',
            'tanggal_transaksi.date' => 'Format tanggal tidak valid',
            'status_pembayaran.required' => 'Status pembayaran harus dipilih',
            'status_pembayaran.in' => 'Status pembayaran tidak valid',
            'file.mimes' => 'File harus berupa PDF, JPG, JPEG, atau PNG',
            'file.max' => 'File maksimal 2MB',
        ];
    }
}