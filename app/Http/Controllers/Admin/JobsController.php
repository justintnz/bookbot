<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Job\BulkDestroyJob;
use App\Http\Requests\Admin\Job\DestroyJob;
use App\Http\Requests\Admin\Job\IndexJob;
use App\Http\Requests\Admin\Job\StoreJob;
use App\Http\Requests\Admin\Job\UpdateJob;
use App\Models\Job;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class JobsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexJob $request
     * @return array|Factory|View
     */
    public function index(IndexJob $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Job::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['booking_id', 'charge', 'customer_id', 'data', 'end_at', 'id', 'location_id', 'service_id', 'staff_id', 'start_at', 'status'],

            // set columns to searchIn
            ['data', 'id', 'status']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.job.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.job.create');

        return view('admin.job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreJob $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreJob $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Job
        $job = Job::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/jobs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param Job $job
     * @throws AuthorizationException
     * @return void
     */
    public function show(Job $job)
    {
        $this->authorize('admin.job.show', $job);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Job $job
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Job $job)
    {
        $this->authorize('admin.job.edit', $job);


        return view('admin.job.edit', [
            'job' => $job,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateJob $request
     * @param Job $job
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateJob $request, Job $job)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Job
        $job->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/jobs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/jobs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyJob $request
     * @param Job $job
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyJob $request, Job $job)
    {
        $job->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyJob $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyJob $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Job::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
