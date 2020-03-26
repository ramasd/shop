<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = ['product_id' => $request->product_id, 'user_id' => Auth::id()];

        Review::updateOrCreate($data, [
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'rating' => $request->rating
        ]);

        return redirect()->back();
    }
}
