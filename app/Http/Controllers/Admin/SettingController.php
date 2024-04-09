<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\ExcelSetting;
use App\Models\Option;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'setting']);
            return $next($request);
        });
    }

    function index()
    {
        $settings = config('core.admin.setting');
        return view('admin.setting', compact('settings'));
    }

    public function clearCache()
    {
        Cache::flush();
        return redirect()->back()->with('success', 'Xóa cache thành công!');
    }

    public function excelConfig(Request $request)
    {
        $setting = $request->all();
        foreach ($setting as $key => $value) {
            ExcelSetting::where('key', $key)->update(['value' => $value]);
        }
        return redirect()->back()->with('success', 'Cập nhật cấu hình excel thành công!');
    }

    public function excelConfigEdit(Request $request)
    {
        $excelSetting = ExcelSetting::get();
        return view('admin.excel-config-edit', compact('excelSetting'));
    }

    public function otherConfig()
    {
        $option = Option::get();
        return view('admin.other-config', ['option' => $option]);
    }

    public function otherConfigUpdate(Request $request)
    {
        $option = $request->except('_token');
        foreach ($option as $key => $value) {
            $option = Option::where('key', $key)->first();
            if ($option) {
                if ($option->type == 'file') {
                    $file = time() . '.' . $value->extension();
                    $value->move(public_path("uploads"), $file);
                    $value = '/uploads/' . $file;
                }
            }

            $option->update(['value' => $value]);
        }
        return redirect()->back()->with('success', 'Cập nhật cấu hình khác thành công!');
    }

    public function migrateDb()
    {
        $output = new \Symfony\Component\Console\Output\BufferedOutput;
        Artisan::call('migrate', [], $output);
        $message = $output->fetch();
        return redirect()->back()->with('success', $message);
    }
}
