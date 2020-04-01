<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages=Page::paginate(10);
        return view('panel.StaticPages.all', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.StaticPages.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = Page::updateOrCreate([
            'name' => $request->name,
            'title' => $request->title,
            'link' => $request->link,
            'description' => $request->description,
            'tags' => $request->tags,
        ]);
//        return redirect()->back();
        return redirect(route('static-page.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::whereId($id)->first();
        return view('panel.StaticPages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $page->update($request->all());
        return redirect(route('static-page.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return Page
     */
    public function destroy($id)
    {
        $page = Page::whereId($id)->first();
        $page->delete();
        return redirect(route('static-page.index'));
    }
}
