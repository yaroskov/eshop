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
        $products = Product::orderBy('id', 'desc')->get();

        $user_ids = array();
        $manufacturer_ids = array();
        $section_ids = array();
        foreach ($products as $product) {
            $user_ids[] = $product->user_id;
            $manufacturer_ids[] = $product->manufacturer_id;
            $section_ids[] = $product->section_id;
        }

        $users = User::whereIn('id', $user_ids)->get();
        $manufacturers = Manufacturer::whereIn('id', $manufacturer_ids)->get();
        $subSections = Section::whereIn('id', $section_ids)->get();
        $sections = Section::where('section_id', 0)->get();

        foreach ($products as $product) {

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

        return view('admin.pages.products')->with($data);
    }
}
