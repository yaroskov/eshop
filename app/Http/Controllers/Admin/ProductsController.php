<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Manufacturer;
use App\Section;
use App\ProductsCount;
use App\Color;

class ProductsController extends Controller
{
    public function index()
    {
        $sections = Section::orderBy('id', 'desc')->get();

        $sectionsSorted = array();
        foreach($sections as $section){
            if($section->section_id == 0){
                foreach ($sections as $s){
                    if($section->id == $s->section_id){

                        $sectionsSorted[$section->value][] = $s->value;
                    }
                }
            }
        }

        $data = array(
            'products' => $this->getProducts(),
            'manufacturers' => Manufacturer::orderBy('id', 'desc')->get(),
            'sections' => $sectionsSorted,
        );

        return view('admin.pages.products')->with($data);
    }

    function getProducts()
    {
        $products = Product::orderBy('id', 'desc')->get();

        $user_ids = array();
        $manufacturer_ids = array();
        $section_ids = array();
        $product_ids = array();

        foreach ($products as $product) {
            $user_ids[] = $product->user_id;
            $manufacturer_ids[] = $product->manufacturer_id;
            $section_ids[] = $product->section_id;
            $product_ids[] = $product->id;
        }

        $users = User::whereIn('id', $user_ids)->get();
        $manufacturers = Manufacturer::whereIn('id', $manufacturer_ids)->get();
        $subSections = Section::whereIn('id', $section_ids)->get();
        $sections = Section::where('section_id', 0)->get();
        $counts = ProductsCount::whereIn('product_id', $product_ids)->get();

        $color_ids = array();
        foreach ($counts as $count) {
            $color_ids[] = $count->color_id;
        }
        $color_ids = array_unique($color_ids);

        $colors = Color::whereIn('id', $color_ids)->get();

        foreach ($products as $product) {

            $countsAll = array();
            $totalCount = 0;

            foreach ($counts as $count) {
                foreach ($colors as $color) {
                    if ($count->color_id == $color->id) {
                        $count->color = $color;
                    }
                }

                if ($count->product_id == $product->id) {
                    $countsAll[] = $count;
                    $totalCount += $count->count;
                }
            }

            $product->counts = $countsAll;
            $product->totalCount = $totalCount;

            foreach ($users as $user) {
                if ($product->user_id == $user->id) {
                    $product->username = $user->name;
                    break;
                }
            }

            foreach ($manufacturers as $manufacturer) {
                if ($manufacturer->id == $product->manufacturer_id) {
                    $product->manufacturer = $manufacturer->name;
                    break;
                }
            }

            foreach ($subSections as $subSection) {
                if ($subSection->id == $product->section_id) {
                    $product->subSection = $subSection->value;

                    foreach ($sections as $section) {
                        if ($subSection->section_id == $section->id) {
                            $product->section = $section->value;
                            break;
                        }
                    }
                    break;
                }
            }
        }

        return $products;
    }

    function add(Request $request)
    {
        if ($request->has('title')) {

            $obj = new Product();
            $obj->name = $request->get('title');
            $obj->description = $request->get('description');
            $obj->cost = $request->get('cost');
            $obj->save();

            $products = $this->getProducts();
            $view = view('admin.tables.products')->with('products', $products)->render();

            return response()->json(['view' => $view]);
        }

        return 'empty';
    }

    public function delete(Request $request)
    {
        if ($request->has('id')) {

            $id = $request->get('id');

            $obj = Product::find($id);
            $obj->delete();

            $products = $this->getProducts();
            $view = view('admin.tables.products')->with('products', $products)->render();

            return response()->json(['view' => $view]);
        }

        return 'empty';
    }
}