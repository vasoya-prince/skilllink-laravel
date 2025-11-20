<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\WorkerProfile;

class CustomerSearchController extends Controller
{
    // Show all skills
    public function skills()
    {
        $skills = Skill::all();

        return view('customer.skills.index', compact('skills'));
    }

    // Show workers based on selected skill
    public function workersBySkill($id)
    {
        $skill = Skill::findOrFail($id);

        // Workers with this skill + approved profiles only
        $workers = WorkerProfile::where('status', 'approved')
                    ->whereHas('skills', function($q) use ($id) {
                        $q->where('skill_id', $id);
                    })
                    ->with('user')
                    ->get();

        return view('customer.skills.workers', compact('skill', 'workers'));
    }

        public function viewWorker($id)
    {
        $worker = WorkerProfile::where('user_id', $id)
                    ->where('status', 'approved')
                    ->with(['user', 'skills'])
                    ->firstOrFail();

        return view('customer.worker.profile', compact('worker'));
    }

}
