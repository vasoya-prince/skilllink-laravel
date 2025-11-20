<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\WorkerProfile;
use App\Models\User;

class CustomerSkillBrowseController extends Controller
{
    /**
     * Show all skills
     */
    public function index()
    {
        $skills = Skill::all();  // fetch all skills

        return view('customer.skills.index', compact('skills'));
    }

    /**
     * Show all workers for a skill
     */
    public function workers($skillId)
    {
        $skill = Skill::findOrFail($skillId);

        $workers = WorkerProfile::whereHas('skills', function($query) use ($skillId) {
            $query->where('skill_id', $skillId);
        })->with('user')->get();

        return view('customer.skills.workers', compact('skill', 'workers'));
    }

    /**
     * View individual worker profile (full page)
     */
    public function viewWorker($id)
    {
        $worker = WorkerProfile::with(['user', 'skills'])->findOrFail($id);

        return view('customer.skills.view-worker', compact('worker'));
    }
}
