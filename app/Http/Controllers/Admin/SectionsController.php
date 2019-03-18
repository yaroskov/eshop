<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Section;

class SectionsController extends Controller
{
    public function index()
    {
        $sections = Section::orderBy('id', 'desc')->get();

        return view('admin.pages.sections')->with('sections', $sections);
    }

    public function addSection(Request $request)
    {
        if ($request->has('data') && $request->has('sectionId')) {

            $section = new Section();
            $section->section_id = $request->get('sectionId');
            $section->value = $request->get('data');
            $section->save();

            $sections = Section::orderBy('id', 'desc')->get();
            $view = view('admin.tables.sections-table')->with('sections', $sections)->render();

            return response()->json(['view' => $view]);
        }

        return 'empty';
    }

    public function deleteSection(Request $request)
    {
        if ($request->has('id')) {

            $id = $request->get('id');

            $obj = Section::find($id);
            $obj->delete();

            $sections = Section::orderBy('id', 'desc')->get();
            $view = view('admin.tables.sections-table')->with('sections', $sections)->render();

            return response()->json(['view' => $view]);
        }

        return 'empty';
    }
}
