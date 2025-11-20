<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\WorkerProfile;
use Illuminate\Support\Facades\Auth;

class WorkerSkillController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $profile = $user->workerProfile;

        // All available skills
        $skills = Skill::all();

        // Already selected skills (IDs)
        $selectedSkills = $profile->skills->pluck('id')->toArray();

        return view('worker.skills', compact('skills', 'selectedSkills'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'skills' => 'required|array',
        ]);

        $workerId = Auth::user()->id;

        // Sync selected skills in pivot
        WorkerProfile::where('user_id', $workerId)
            ->first()
            ->skills()
            ->sync($request->skills);

        return back()->with('success', 'Skills updated successfully!');
    }
}
