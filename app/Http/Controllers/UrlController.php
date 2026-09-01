<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;

class UrlController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'original_url' => 'required|url',
        ]);

        $url = Url::create([
            'original_url' => $request->original_url,
            'code' => Url::generateUniqueCode(),
        ]);

        return back()->with('short_url', url($url->code));
    }

    public function redirect(string $code){
        $url = Url::where('code', $code)->firstOrFail();
        $url->increment('clicks');

        return redirect()->away($url->original_url);
    }
}
