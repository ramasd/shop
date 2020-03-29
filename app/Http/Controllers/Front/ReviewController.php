<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = ['product_id' => $request->product_id, 'user_id' => auth()->id()];

        Review::updateOrCreate($data, [
            'product_id' => $request->product_id,
            'user_id' => auth()->id(),
            'rating' => $request->rating
        ]);

        return redirect()->back();
    }
}
