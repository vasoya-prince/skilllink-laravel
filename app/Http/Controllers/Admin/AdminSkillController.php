<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class AdminSkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:skills,name',
            'icon' => 'nullable|string'
        ]);

        Skill::create([
            'name' => $request->name,
            'icon' => $request->icon,
        ]);

        return redirect()->route('admin.skills.index')->with('success', 'Skill created successfully!');
    }

    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:skills,name,' . $id,
            'icon' => 'nullable|string'
        ]);

        $skill->update([
            'name' => $request->name,
            'icon' => $request->icon,
        ]);

        return redirect()->route('admin.skills.index')->with('success', 'Skill updated successfully!');
    }

    public function destroy($id)
    {
        Skill::destroy($id);
        return back()->with('success', 'Skill deleted successfully!');
    }
}
