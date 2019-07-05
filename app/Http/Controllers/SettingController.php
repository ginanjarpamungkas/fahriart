<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Other;

class SettingController extends Controller
{
    public function web()
    {
    	$profile = Other::whereKeterangan('profile')->first();
        $pengerjaan = Other::whereKeterangan('pengerjaan')->first();
        $kualitas = Other::whereKeterangan('kualitas')->first();
        $harga = Other::whereKeterangan('harga')->first();
        return view('setting.index', compact('profile','pengerjaan','kualitas','harga'));
    }

    public function update(Request $request)
	{  
		for ($i=2; $i < 6; $i++) { 
            $setting = Other::find($i);
            $setting->update([
                'detail' => $request->detail[$i],
            ]);
        }

		return redirect()->back()->with('success','Setting updated');
	}

	public function harga()
    {
    	$harga = Other::whereKeterangan('ket_harga')->first();
        return view('setting.harga', compact('harga'));
    }

    public function updateharga(Request $request, $id)
    {
        $this->validate($request, [
         'detail'        => 'required',
        ]);

        $harga = Other::find($id);

        $harga->update([
         'detail'           => $request->detail,
        ]);

        return back()->with('success', 'Harga updated');
    }

    public function akun()
    {
        $settings = Setting::get();
        return view('setting.akun', compact('settings'));
    }

    public function updateakun(Request $request)
    {
        //dd($request->all());
        foreach($request->except(['_token']) as $key => $value){
            $option = Setting::whereSettingKey($key)->first();
            $option->update(['setting_value' => $value]);
        }

        return redirect()->back()->with('success','Setting updated');
    }
}
