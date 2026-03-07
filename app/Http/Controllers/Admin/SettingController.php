<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }


    public function general(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'company' => ['required', 'max:255'],
            'header' => ['required'],
            'theme' => ['required'],
            'icon_size' => ['required'],
            'logo_size' => ['required'],
            'icon_light' => ['nullable', 'image', 'max:2048'],
            'icon_dark' => ['nullable', 'image', 'max:2048'],
            'logo_light' => ['nullable', 'image', 'max:2048'],
            'logo_dark' => ['nullable', 'image', 'max:2048'],
            'home_image' => ['nullable', 'image', 'max:2048'],
        ]);

        $datas = $validatedData;


        if ($request->hasFile('icon_light')) {
            $filename = 'icon_light_'.time().'.'.$request->file('icon_light')->getClientOriginalExtension();
            $datas['icon_light'] = $request->file('icon_light')->storeAs('images/setting', $filename, 'public');
        }

        if ($request->hasFile('icon_dark')) {
            $filename = 'icon_dark_'.time().'.'.$request->file('icon_dark')->getClientOriginalExtension();
            $datas['icon_dark'] = $request->file('icon_dark')->storeAs('images/setting', $filename, 'public');
        }

        if ($request->hasFile('logo_light')) {
            $filename = 'logo_light_'.time().'.'.$request->file('logo_light')->getClientOriginalExtension();
            $datas['logo_light'] = $request->file('logo_light')->storeAs('images/setting', $filename, 'public');
        }

        if ($request->hasFile('logo_dark')) {
            $filename = 'logo_dark_'.time().'.'.$request->file('logo_dark')->getClientOriginalExtension();
            $datas['logo_dark'] = $request->file('logo_dark')->storeAs('images/setting', $filename, 'public');
        }
        if ($request->hasFile('home_image')) {
            $filename = 'home_image_'.time().'.'.$request->file('home_image')->getClientOriginalExtension();
            $datas['home_image'] = $request->file('home_image')->storeAs('images/setting', $filename, 'public');
        }

        $datas = array_filter($datas, function ($value) {
            return !is_null($value);
        });

        foreach ($datas as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'General Settings Updated');
    }

    public function contact(Request $request)
    {
        $validatedData = $request->validate([
            'contact_email'     => ['required', 'max:500'],
            'contact_phone'     => ['required', 'max:500'],
            'contact_address'   => ['required', 'max:500'],
        ]);

        $datas = $validatedData;

        $datas = array_filter($datas, function ($value) {
            return !is_null($value);
        });

        foreach ($datas as $key => $value) {
           Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Contact Settings Updated');
    }

    public function sosmed(Request $request)
    {
        $validatedData = $request->validate([
            'sosmed_facebook'   => ['required','url', 'max:500'],
            'sosmed_youtube'    => ['required','url', 'max:500'],
            'sosmed_whatsapp'   => ['required','url', 'max:500'],
            'sosmed_instagram'  => ['required','url', 'max:500'],
            'sosmed_tiktok'     => ['required','url', 'max:500'],
        ]);

        $datas = $validatedData;

        $datas = array_filter($datas, function ($value) {
            return !is_null($value);
        });

        foreach ($datas as $key => $value) {
           Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Sosmed Settings Updated');
    }
    public function redaksi(Request $request)
    {
        $validatedData = $request->validate([
            'redaksi'   => ['required', 'max:50000'],
        ]);

        $datas = $validatedData;

        $datas = array_filter($datas, function ($value) {
            return !is_null($value);
        });

        foreach ($datas as $key => $value) {
           Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Redaksi Settings Updated');
    }
    public function kode(Request $request)
    {
        $validatedData = $request->validate([
            'kode_etik'   => ['required', 'max:50000'],
        ]);

        $datas = $validatedData;

        $datas = array_filter($datas, function ($value) {
            return !is_null($value);
        });

        foreach ($datas as $key => $value) {
           Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Kode Etik Settings Updated');
    }
    public function pedoman(Request $request)
    {
        $validatedData = $request->validate([
            'pedoman_media_siber'   => ['required', 'max:50000'],
        ]);

        $datas = $validatedData;

        $datas = array_filter($datas, function ($value) {
            return !is_null($value);
        });

        foreach ($datas as $key => $value) {
           Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Pedoman Media Siber Settings Updated');
    }
    public function disclaimer(Request $request)
    {
        $validatedData = $request->validate([
            'disclaimer'   => ['required', 'max:50000'],
        ]);

        $datas = $validatedData;

        $datas = array_filter($datas, function ($value) {
            return !is_null($value);
        });

        foreach ($datas as $key => $value) {
           Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Disclaimer Settings Updated');
    }
    public function googleAds(Request $request)
    {
        $validatedData = $request->validate([
            'google_ads_client'   => ['required', 'max:50'],
        ]);

        $datas = $validatedData;

        $datas = array_filter($datas, function ($value) {
            return !is_null($value);
        });

        foreach ($datas as $key => $value) {
           Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Disclaimer Settings Updated');
    }

    public function tentangKami(Request $request)
    {
        $validatedData = $request->validate([
            'tentang_kami'   => ['required', 'max:50000'],
        ]);

        $datas = $validatedData;

        $datas = array_filter($datas, function ($value) {
            return !is_null($value);
        });

        foreach ($datas as $key => $value) {
           Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Tentang Kami Settings Updated');
    }

    public function syaratKetentuan(Request $request)
    {
        $validatedData = $request->validate([
            'syarat_ketentuan'   => ['required', 'max:50000'],
        ]);

        $datas = $validatedData;

        $datas = array_filter($datas, function ($value) {
            return !is_null($value);
        });

        foreach ($datas as $key => $value) {
           Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Syarat dan Ketentuan Settings Updated');
    }

    public function layanan(Request $request)
    {
        $validatedData = $request->validate([
            'layanan'   => ['required', 'max:50000'],
        ]);

        $datas = $validatedData;

        $datas = array_filter($datas, function ($value) {
            return !is_null($value);
        });

        foreach ($datas as $key => $value) {
           Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Layanan Settings Updated');
    }

    public function kerjaSama(Request $request)
    {
        $validatedData = $request->validate([
            'kerja_sama'   => ['required', 'max:50000'],
        ]);

        $datas = $validatedData;

        $datas = array_filter($datas, function ($value) {
            return !is_null($value);
        });

        foreach ($datas as $key => $value) {
           Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Kerja Sama Settings Updated');
    }
}
