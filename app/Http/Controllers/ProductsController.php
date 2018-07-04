<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function indexWithFilters(Request $request) {

        $bore = request()->input('bore');
        $type = request()->input('type');
        $group = request()->input('group');
        $innerDiameter = request()->input('innerDiameter');
        $outerDiameter = request()->input('outerDiameter');
        $length = request()->input('length');

        \Log::info($request);

        if ($bore === 'round') {
            //dd($bore);
            $products = Product::where('podtip_en', 'NOT LIKE', "%square%")
                                ->where('podtip_en', 'NOT LIKE', "%hex%")
                                ->where('tip_en', 'like', '%'.$type.'%')
                                ->where('grupa_en', 'like', '%'.$group.'%')
                                ->where('D', 'like', '%'.$innerDiameter.'%')
                                ->paginate(20);

        } else {
            $products = Product::where('podtip_en', 'like', '%'.$bore.'%')
                                ->where('tip_en', 'like', '%'.$type.'%')
                                ->where('grupa_en', 'like', '%'.$group.'%')
                                ->where('D', 'like', "%$innerDiameter%")
                                ->paginate(20);
        }

        return response()->json(compact('products'));
    }
}
