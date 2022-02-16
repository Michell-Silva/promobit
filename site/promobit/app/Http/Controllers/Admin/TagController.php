<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * @var tag
     */
    private $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function index()
    {
        $tags = $this->tag->paginate(10);

        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags',
        ],[
            "name.unique" => "O nome já foi escolhido."
        ]);

        $data = $request->all();

        $this->tag->create($data);

        flash( 'Tag criado com sucesso!')->success();

        return redirect()->route('admin.tags.index');
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

    public function edit($id)
    {
        $tag = $this->tag->findOrFail($id);

        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags',
        ],[
            "name.unique" => "O nome já foi escolhido."
        ]);

        $data = $request->all();

        $tag = $this->tag->find($id);

        $tag->update($data);

        flash('Tag atualizada com sucesso!')->success();

        return redirect()->route('admin.tags.index');
    }

    public function destroy($id)
    {
        $tag = $this->tag->find($id);

        $tag->delete();

        flash('Tag removida com sucesso!')->success();

        return redirect()->route('admin.tags.index');
    }
}
