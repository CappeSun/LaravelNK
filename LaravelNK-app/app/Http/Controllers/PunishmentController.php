<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Punishment;

class PunishmentController extends Controller
{
    public function add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        $punishment = new Punishment;

        $punishment->name = $request->name;

        $punishment->save();

        return back();
    }

    public function delete(Request $request, $id)
    {
        $punishment = Punishment::FindOrFail($id);

        $punishment->delete();

        return back();
    }
}
