<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
{
    //
    public function index()
    {
      
        $attributes = Attribute::orderByDesc('created_at')->paginate(10);
        $title = 'Attributes';
        return view('admin.Attributes.index', compact('attributes', 'title'));

    }


    public function create()
    {
        return view('admin.Attributes.add');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attribute' => 'required|max:255',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Add attribute faild');
        }
        Attribute::create($request->all());
        return redirect()->route('attributes.index')
            ->with('success', 'Attribute created successfully.');
    }

    public function show(Attribute $attribute)
    {
        return view('attributes.show', compact('attribute'));
    }


    public function edit(Attribute $attribute)
    {
        return view('admin.Attributes.edit', compact('attribute'));
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attribute' => 'required|max:255',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Add attribute faild');
        }

        Attribute::find($request->id)->update($request->all());
        return redirect()->route('attributes.index')
            ->with('success', 'Attribute updated successfully.');
    }


    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return redirect()->route('attributes.index')
            ->with('success', 'Attribute deleted successfully.');
    }
}
