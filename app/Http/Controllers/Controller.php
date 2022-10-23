<?php

namespace App\Http\Controllers;

use App\Models\ApiRequest;
use App\Models\ApiResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Carbon;
use function redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreApiRequest;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected array $dateFields = [
        'next_pay_date',
        'following_pay_date',
        'employment_start_date',
        'date_of_birth',
        'address_move_in_date'
    ];

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
     * @throws GuzzleException
     */
    public function process(StoreApiRequest $request): Application|RedirectResponse|Redirector
    {
        $validated = $request->all();

        // Add non form values.
        $validated['ip_address'] = $request->ip();
        $validated['user_agent'] = $request->server('HTTP_USER_AGENT');

        // Store validated values to DB
         ApiRequest::create($validated);

        // Send the API Request
        $callResponse = $this->callApi($validated);

        return redirect('/')
            ->with('status', $callResponse['statusCode'])
            ->with('data', $callResponse['body']);
    }

    /**
     * Should be moved to a helper but for visibility it's here.
     *
     * @param array $data
     * @return array
     * @throws GuzzleException
     */
    public function callApi(array $data): array
    {
        $url = (string) env('MBDEV');

        $data = $this->fixDates($data);

        // Add credentials.
        $data['aff_id'] = env('AFF_ID');
        $data['aff_password'] = env('AFF_PASSWORD');
        $data['test_lead'] = true;

        // Set content type to JSON.
        $client = new Client();

        $response = $client->request('POST', $url, [
            'json' => $data
        ]);

        $responseBody = json_decode($response->getBody(), true);

        ApiResponse::create([
            'raw_response' => $response->getBody(),
            'status' => $responseBody['status'] ?? "not set",
            'errors' => json_encode($responseBody['errors'] ?? ''),
            'redirect_uri' => $responseBody['redirect_uri'] ?? ""
        ]);

        return [
            'statusCode' =>  $response->getStatusCode(),
            'body' => $responseBody
        ];
    }

    /**
     * I'm sure there's a middleware that should be able to do this
     * within Laravel request obj..
     *
     * @param array $data
     * @return array
     */
    public function fixDates(array $data): array
    {
        foreach ($data as $key => $value) {
            if (in_array($key, $this->dateFields)) {
                $data[$key] = Carbon::createFromFormat('Y-m-d', $value)
                    ->format('d-m-Y');
            }
        }

        return $data;
    }
}
