<?php

namespace Modules\Modulemanager\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Nwidart\Modules\Facades\Module;

class MainController extends Controller
{
    public function index()
    {

        return view('modulemanager::index');
    }

    public function set(Request $request)
    {
        $modulename = $request->set;
      $module =   Module::find($modulename);
        try {
            if ($module->isEnabled()){
                $module->disable();
                return redirect()->route('panel.modules')->with('success', 'ماژول با موفقیت غیرفعال شد');

            }else{
                $module->enable();
                return redirect()->route('panel.modules')->with('success', 'ماژول با موفقیت فعال شد');

            }

        } catch (\Exception $e) {
            return redirect()->back()->with('errors', 'اشکال در اعمال تغییرات');
        }
    }
}
