<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Staff\BulkDestroyStaff;
use App\Http\Requests\Admin\Staff\DestroyStaff;
use App\Http\Requests\Admin\Staff\IndexStaff;
use App\Http\Requests\Admin\Staff\StoreStaff;
use App\Http\Requests\Admin\Staff\UpdateStaff;
use App\Models\Staff;
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

class StaffController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexStaff $request
     * @return array|Factory|View
     */
    public function index(IndexStaff $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Staff::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['data', 'id', 'name', 'phone', 'status'],

            // set columns to searchIn
            ['data', 'id', 'name', 'phone', 'status']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.staff.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.staff.create');

        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStaff $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreStaff $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Staff
        $staff = Staff::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/staff'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/staff');
    }

    /**
     * Display the specified resource.
     *
     * @param Staff $staff
     * @throws AuthorizationException
     * @return void
     */
    public function show(Staff $staff)
    {
        $this->authorize('admin.staff.show', $staff);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Staff $staff
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Staff $staff)
    {
        $this->authorize('admin.staff.edit', $staff);


        return view('admin.staff.edit', [
            'staff' => $staff,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStaff $request
     * @param Staff $staff
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateStaff $request, Staff $staff)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Staff
        $staff->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/staff'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/staff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyStaff $request
     * @param Staff $staff
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyStaff $request, Staff $staff)
    {
        $staff->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyStaff $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyStaff $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Staff::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
