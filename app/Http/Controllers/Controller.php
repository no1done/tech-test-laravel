<?php

namespace App\Http\Controllers;

use App\Models\ApiRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Routing\Redirector;
use function redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreApiRequest;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @return Application|Factory|View
     */
    public function form(): View|Factory|Application
    {
        $api_requests = DB::table('api_requests')->get();

        return view('api-form', ['api_requests' => $api_requests]);
    }

    /**
     * Process form POST request
     *
     * @param StoreApiRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function process(StoreApiRequest $request): Application|RedirectResponse|Redirector
    {
        $validated = $request->all();

        // Add non form values.
        $validated['ip_address'] = $request->ip();
        $validated['user_agent'] = $request->server('HTTP_USER_AGENT');

        // Store validated values to DB
        ApiRequest::create($validated);

        return redirect('/');
    }
}
