<?php
namespace App\Http\Controllers\Api;

use App\Models\WorkingJob;
use App\Services\JobFilterService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkingJobController extends Controller
{
    protected $filterService;

    public function __construct(JobFilterService $filterService)
    {
        $this->filterService = $filterService;
    }

    public function index(Request $request)
    {
        $jobs = WorkingJob::query();
        if ($filter = $request->get('filter')) {
            $jobs = $this->filterService->applyFilters($jobs, $filter);
        }

        $jobs = $jobs->paginate(10);
        return response()->json($jobs);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'company_name' => 'required|string',
            'salary_min' => 'required|numeric',
            'salary_max' => 'required|numeric',
            'is_remote' => 'required|boolean',
            'job_type' => 'required|in:full-time,part-time,contract,freelance',
            'status' => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
        ]);

        $job = WorkingJob::create($data);
        return response()->json($job, 201);
    }

    public function show(WorkingJob $job)
    {
        return response()->json($job);
    }

    public function update(Request $request, WorkingJob $job)
    {
        $data = $request->validate([
            'title' => 'sometimes|required|string',
            'description' => 'sometimes|required|string',
            'company_name' => 'sometimes|required|string',
            'salary_min' => 'sometimes|required|numeric',
            'salary_max' => 'sometimes|required|numeric',
            'is_remote' => 'sometimes|required|boolean',
            'job_type' => 'sometimes|required|in:full-time,part-time,contract,freelance',
            'status' => 'sometimes|required|in:draft,published,archived',
            'published_at' => 'nullable|date',
        ]);

        $job->update($data);
        return response()->json($job);
    }

    public function destroy($jobId)
    {
        $job = WorkingJob::findOrFail($jobId);
        $job->delete();
        return response()->json(['message' => 'Job deleted successfully '], 200);
    }

}
