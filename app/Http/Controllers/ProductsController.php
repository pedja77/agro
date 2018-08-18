<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

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
                                ->where('D_', 'like', '%'.$innerDiameter.'%')
                                ->where('D', 'like', '%'.$outerDiameter.'%')
                                ->where('B', 'like', '%'.$length.'%')
                                ->paginate(20);

        } elseif ($bore === 'hex' || $bore === 'square') { // videti po kojoj se koloni kada  filtrira
            $products = Product::where('podtip_en', 'like', '%'.$bore.'%')
                                ->where('tip_en', 'like', '%'.$type.'%')
                                ->where('grupa_en', 'like', '%'.$group.'%')
                                ->where('A_', 'like', "%$innerDiameter%")
                                ->where('D', 'like', '%'.$outerDiameter.'%')
                                ->where('B', 'like', '%'.$length.'%')
                                ->paginate(20);
        } else {
            $products = Product::where('tip_en', 'like', '%'.$type.'%')
                                ->where('grupa_en', 'like', '%'.$group.'%')
                                ->where('D_', 'like', "%$innerDiameter%")
                                ->where('D', 'like', '%'.$outerDiameter.'%')
                                ->where('B', 'like', '%'.$length.'%')
                                ->paginate(20);
        }

        return response()->json(compact('products'));
    }

    public function index() {

        $products = Product::paginate(20);
        $categories = $this->getCategories();

        //dd(response()->json(compact(['products', 'categories'])));
        return view('catalog', compact(['products', 'categories']));
    }

    private function getCategories() {

        $categories = Category::getCategories();
        return $categories;
    }

    public function getTypes() {

        $types = Product::select('tip_en')->distinct()->get()->map(function($item, $index) {
            $item = $item["tip_en"];
            return $item;
        });

        return response()->json(compact('types'));
    }

    public function getGroups() {

        $groups = Product::select('grupa_en')->distinct()->get()->map(function($item, $index) {
            $item = $item["grupa_en"];
            return $item;
        });

        return response()->json(compact('groups'));
    }

//     $query = "SELECT DISTINCT A_ FROM roba WHERE PODTIP_SR LIKE '%Äetvrtasti%' ORDER BY (A_*1)" ; // square
// $query = "SELECT DISTINCT A_ FROM roba WHERE PODTIP_EN LIKE '%hex%' ORDER BY (A_*1)" ; // hexagonal
// $query = "SELECT DISTINCT A_ FROM roba WHERE NOT(PODTIP_SR LIKE '%Äetvrtasti%') AND NOT(PODTIP_EN LIKE '%hex%') ORDER BY (A_*1)" ; // round

    public function getBoreDiameters() {

        $square = Product::select('A_')
                        ->distinct()
                        ->where('podtip_en', 'like','%square%')
                        ->orderBy('A_')
                        ->get()
                        ->map(function($item) {
                            return $item['A_'];
                        });

        $hex = Product::select('A_')
                        ->distinct()
                        ->where('podtip_en', 'like','%hex%')
                        ->orderBy('A_')
                        ->get()
                        ->map(function($item, $index) {
                            return $item['A_'];
                        });


        \Log::info('bores', [$square, $hex]);
        // $round = Product::select('A_')
        //                 ->distinct()
        //                 ->where('podtip_en', 'not like','%hex%')
        //                 ->where('podtip_en', 'not like','%square%')
        //                 ->orderBy('A_')
        //                 ->get();

        return response()->json(compact(['square', 'hex']));
    }
}
