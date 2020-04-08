<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function menu()
    {
        $menus = Menu::paginate(10);
//        return $menus;
        return view('panel.menu.all', compact('menus'));
    }

    public function addToMenu(Request $request)
    {
        $servant = Menu::updateOrCreate([
            'page_id' => $request->page_id,
        ]);
        return redirect()->back();
    }


    public function removeToMenu(Menu $menu)
    {
        $menu->delete();
        return redirect()->back();
    }




    public function footer()
    {
        $footer = Footer::first();
        return view('panel.footer.create',compact('footer'));
    }

    public function addFooter(Request $request)
    {
        $footer = Footer::first();

        $footer->update([
            'description' => $request->description,
        ]);

        return redirect()->back();
    }



    public function slider()
    {
//        $menus = Menu::paginate(10);
        return view('panel.slider.all');
    }

}
