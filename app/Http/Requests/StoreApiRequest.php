<?php

namespace App\Http\Requests;

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
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'referring_website' => 'required|string',
            'loan_amount' => 'required|numeric',
            'loan_purpose' => ['required', new Enum(LoanPurpose::class)],
            'loan_term' => 'required|integer',
            'guarantor' => ['required', 'string', Rule::in(['yes', 'no']),],
            'title' => ['required', new Enum(Title::class)],
            'first_name' => 'required|string|min:2',
            'middle_name' => 'string',
            'last_name' => 'required|string|min:2',
            'gender' => ['required', new Enum(Gender::class)],
            'date_of_birth' => ['required','date', new DateBehind],
            'marital_status' => ['required', new Enum(MaritalStatus::class)],
            'number_of_dependents' => 'required|int|max:9',
            'house_name' => '',
            'house_number' => '',
            'flat_name' => '',
            'street_name' => 'required|string|min:2',
            'city' => 'required|string|min:2',
            'county' => 'required|string|min:2',
            'post_code' => 'required|string|min:5|max:7',
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
            'bank_account_number' => 'required|string|size:8',
            'bank_sort_code' => 'required|string|size:8', // Create preg rule?
            'bank_card_type' => ['required', new Enum(BankCardType::class)],
            'consent_email_sms' => 'required|boolean',
            'consent_email' => 'required|boolean',
            'consent_sms' => 'required|boolean',
            'consent_call' => 'required|boolean',
            'consent_credit_search' => 'required|boolean',
            'consent_financial' => 'required|boolean'
        ];
    }
}
