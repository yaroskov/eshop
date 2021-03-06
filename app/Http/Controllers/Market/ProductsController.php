<?php

namespace App\Http\Controllers\Market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        $data = array(
            'products' => $products,
        );

        return view('market.pages.products')->with($data);
    }
}
