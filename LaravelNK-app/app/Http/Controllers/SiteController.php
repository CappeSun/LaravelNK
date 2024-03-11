<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;

class SiteController extends Controller
{
    public function add(Request $request)
    {
        $this->validate($request, [
            'name' => 'nullable|string|max:255',
            'url' => 'required|url|max:255',
            'punishment' => 'required|numeric'
        ]);

        $site = new Site;

        if ($request->name != null)
            $site->name = $request->name;
        $site->url = $request->url;
        $site->punishment_id = $request->punishment;

        $site->save();

        return back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'nullable|string|max:255',
            'url' => 'nullable|url|max:255',
            'punishment' => 'nullable|numeric'
        ]);

        $site = Site::FindOrFail($id);

        if ($request->name) $site->name = $request->name;
        if ($request->url) $site->url = $request->url;
        if ($request->punishment) $site->punishment_id = $request->punishment;

        $site->update();

        return back();
    }

    public function delete(Request $request, $id)
    {
        $site = Site::FindOrFail($id);

        $site->delete();

        return back();
    }
}