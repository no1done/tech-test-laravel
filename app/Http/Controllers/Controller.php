<?php

namespace App\Http\Controllers;

use App\Enums\BankCardType;
use App\Enums\BankName;
use App\Enums\EmployerIndustry;
use App\Enums\EmploymentStatus;
use App\Enums\Gender;
use App\Enums\LoanPurpose;
use App\Enums\MaritalStatus;
use App\Enums\MobilePhoneType;
use App\Enums\PaymentFrequency;
use App\Enums\PaymentMethod;
use App\Enums\ResidentialStatus;
use App\Enums\Title;
use App\Rules\DateAhead;
use App\Rules\DateBehind;
use App\Rules\FollowingPayDate;
use App\Rules\MobileNumber;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use function redirect;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Process form POST request
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function process(Request $request): Application|RedirectResponse|Redirector
    {
        $validated = $request->validate([
            'referring_website' => 'required|string',
            'loan_amount' => 'required|numeric',
            'loan_purpose' => ['required', new Enum(LoanPurpose::class)],
            'loan_term' => 'required|integer',
            'guarantor' => ['required', 'string', Rule::in(['yes', 'no']),],
            'title' => ['required', new Enum(Title::class)],
            'first_name' => 'required|string|min:2',
            'middle_name' => 'string|min:2',
            'last_name' => 'required|string|min:2',
            'gender' => ['required', new Enum(Gender::class)],
            'date_of_birth' => ['required','date', new DateAhead],
            'marital_status' => ['required', new Enum(MaritalStatus::class)],
            'number_of_dependents' => 'required|int|max:9',
            'street_name' => 'required|string|min:2',
            'city' => 'required|string|min:2',
            'county' => 'required|string|min:2',
            'post_code' => 'required|alpha_num|min:5|max:7',
            'residential_status' => ['required', new Enum(ResidentialStatus::class)],
            'address_move_in_date' => ['required', 'date', new DateBehind],
            'mobile_number' => ['required', 'numeric', new MobileNumber],
            'home_number' => ['required', 'numeric', new PhoneNumber],
            'work_number' => ['required', 'numeric', new PhoneNumber],
            'mobile_phone_type' => ['required', new Enum(MobilePhoneType::class)],
            'email_address' => 'required|email',
            'employment_status' => ['required', new Enum(EmploymentStatus::class)],
            'payment_frequency' => ['required', new Enum(PaymentFrequency::class)],
            'payment_method' => ['required' => new Enum(PaymentMethod::class)],
            'monthly_income' => 'required|numeric',
            'next_pay_date' => ['required', 'date', new DateAhead],
            'following_pay_date' => ['required', 'date', new FollowingPayDate],
            'job_title' => 'required|string|min:2',
            'employer_name' => 'required|string',
            'employer_industry' => ['required', new Enum(EmployerIndustry::class)],
            'employment_start_date' => ['required', 'date', new DateBehind],
            'expenditure_housing' => 'required|numeric',
            'expenditure_credit' => 'required|numeric',
            'expenditure_transport' => 'required|numeric',
            'expenditure_food' => 'required|numeric',
            'expenditure_utilities' => 'required|numeric',
            'expenditure_other' => 'required|numeric',
            'bank_name' => ['required', new Enum(BankName::class)],
            'bank_account_number' => 'required|numeric|size:8',
            'bank_sort_code' => 'required|numeric|size:6', // Create preg rule?
            'bank_card_type' => ['required', new Enum(BankCardType::class)],
            'consent_email_sms' => 'required|boolean',
            'consent_email' => 'required|boolean',
            'consent_sms' => 'required|boolean',
            'consent_call' => 'required|boolean',
            'consent_credit_search' => 'required|boolean',
            'consent_financial' => 'required|boolean'
        ]);

        return redirect('/');
    }
}
