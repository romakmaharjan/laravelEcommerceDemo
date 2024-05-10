<?php

namespace App\Http\Controllers\Backend\Section;

use App\Http\Controllers\Controller;
use App\models\Category;
use App\Models\Section;
use Illuminate\Http\Request;
// use App\Http\Controllers\Backend\Category;

class SectionController extends Controller
{
    private $pagePath = "backend.pages.";
    public function index()
    {
        $sectionData = Section::all();
        return view($this->pagePath . 'section.index', compact('sectionData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view($this->pagePath . 'section.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $validatedData =$request->validate([
            'name' => 'required|unique:sections|min:3|max:255',

        ]);
        Section::create($validatedData);
        return redirect()->route('manage-section.index')->with('success', 'Section created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = Section::find($id);
        return view($this->pagePath . 'section.show', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $section = Section::find($id);
        return view($this->pagePath . 'section.update', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:sections,name,' . $id . '|min:3|max:255',
        ]);
        Section::whereId($id)->update($validatedData);
        return redirect()->route('manage-section.index')->with('success', 'Section is successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findCategory = Category::where('section_id', $id)->count();
        if ($findCategory > 0) {
            return redirect()->route('manage-section.index')->with('error', 'Section cannot be deleted as it has categories');
        }else{
            Section::whereId($id)->delete();
                        return redirect()->route('manage-section.index')->with('error', 'Section delete successfully');

        }
    }
}