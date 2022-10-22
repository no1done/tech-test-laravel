@php
use App\Enums\LoanPurpose;
use App\Enums\BankCardType;
use App\Enums\BankName;
use App\Enums\EmployerIndustry;
use App\Enums\EmploymentStatus;
use App\Enums\Gender;
use App\Enums\MaritalStatus;
use App\Enums\MobilePhoneType;
use App\Enums\PaymentFrequency;
use App\Enums\PaymentMethod;
use App\Enums\ResidentialStatus;
use App\Enums\Title;
@endphp
@extends('layout')

@section('content')

    @include('previous-requests', ['api_requests' => $api_requests])

    <h3 class="mt-5">New Request</h3>

    <form method="POST" action="/">

        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <h4 class="d-block mt-3" style="border-bottom:solid 1px #000;">Loan Information</h4>
            </div>


                <div class="form-group mb-3 col-6">
                    <label for="referring_website">Referring Website</label>
                    <input type="text" class="form-control" name="referring_website" id="referring_website"
                           value="www.some-loan-company.co.uk"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="loan_amount">Loan Amount</label>
                    <input type="number" class="form-control" name="loan_amount" id="loan_amount" value="1250"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="loan_purpose">Loan Purpose</label>
                    <select class="form-control" name="loan_purpose" id="loan_purpose">
                        @foreach (LoanPurpose::cases() as $case)
                        <option value="{{ $case->value }}">{{ ucwords(str_replace("_", " ",$case->value)) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="loan_term">Loan Term</label>
                    <input type="number" class="form-control" name="loan_term" id="loan_term" value="12"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="guarantor">Guarantor</label>
                    <select class="form-control" name="guarantor" id="guarantor">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h4 class="d-block mt-3" style="border-bottom:solid 1px #000;">Customer Information</h4>
            </div>

                <div class="form-group mb-3 col-6">
                    <label for="title">Title</label>
                    <select class="form-control" name="title" id="title">
                        @foreach(Title::cases() as $case)
                        <option value="{{ $case->value }}">{{ ucwords(str_replace("_", " ",$case->value)) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="New"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" class="form-control" name="middle_name" id="middle_name" value="test"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" value="Lead"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" id="gender">
                        @foreach(Gender::cases() as $case)
                        <option value="{{ $case->value }}">{{ ucwords(str_replace("_", " ",$case->value)) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="date_of_birth">Date Of Birth</label>
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="1999-11-30"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="marital_status">Marital Status</label>
                    <select class="form-control" name="marital_status" id="marital_status">
                        @foreach(MaritalStatus::cases() as $case)
                        <option value="{{ $case->value }}">{{ ucwords(str_replace("_", " ",$case->value)) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="number_of_dependents">Number Of Dependents</label>
                    <input type="number" class="form-control" name="number_of_dependents" id="number_of_dependents"
                           value="0"/>
                </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h4 class="d-block mt-3" style="border-bottom:solid 1px #000;">Address Details</h4>
            </div>

                <div class="form-group mb-3 col-6">
                    <label for="house_number">House Number</label>
                    <input type="text" class="form-control" name="house_number" id="house_number" value="2"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="house_name">House Name</label>
                    <input type="text" class="form-control" name="house_name" id="house_name" value="clifford house"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="flat_number">Flat Number</label>
                    <input type="text" class="form-control" name="flat_number" id="flat_number" value="2"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="street_name">Street Name</label>
                    <input type="text" class="form-control" name="street_name" id="street_name" value="clifford avenue"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" id="city" value="manchester"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="county">County</label>
                    <input type="text" class="form-control" name="county" id="county" value="greater manchester"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="post_code">Post Code</label>
                    <input type="text" class="form-control" name="post_code" id="post_code" value="m3 2hw"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="residential_status">Residential Status</label>
                    <select class="form-control" name="residential_status" id="residential_status">
                        @foreach(ResidentialStatus::cases() as $case)
                        <option value="{{ $case->value }}">{{ ucwords(str_replace("_", " ",$case->value)) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="address_move_in_date">Address Move In Date</label>
                    <input type="date" class="form-control" name="address_move_in_date" id="address_move_in_date"
                           value="2016-03-08"/>
                </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h4 class="d-block mt-3" style="border-bottom:solid 1px #000;">Contact Details</h4>
            </div>

                <div class="form-group mb-3 col-6">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="text" class="form-control" name="mobile_number" id="mobile_number"
                           value="07824516323"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="home_number">Home Number</label>
                    <input type="text" class="form-control" name="home_number" id="home_number" value="01617110415"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="work_number">Work Number</label>
                    <input type="text" class="form-control" name="work_number" id="work_number" value="01617110415"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="mobile_phone_type">Mobile Phone Type</label>
                    <select class="form-control" name="mobile_phone_type" id="mobile_phone_type">
                        @foreach(MobilePhoneType::cases() as $case)
                        <option value="{{ $case->value }}">{{ ucwords(str_replace("_", " ",$case->value)) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="email_address">Email Address</label>
                    <input type="email" class="form-control" name="email_address" id="email_address"
                           value="test@mediablanket.co.uk"/>
                </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h4 class="d-block mt-3" style="border-bottom:solid 1px #000;">Employment Information</h4>
            </div>


                <div class="form-group mb-3 col-6">
                    <label for="employment_status">Employment Status</label>
                    <select class="form-control" name="employment_status" id="employment_status">
                        @foreach(EmploymentStatus::cases() as $case)
                        <option value="{{ $case->value }}">{{ ucwords(str_replace("_", " ",$case->value)) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="payment_frequency">Payment Frequency</label>
                    <select class="form-control" name="payment_frequency" id="payment_frequency">
                        @foreach(PaymentFrequency::cases() as $case)
                        <option value="{{ $case->value }}">{{ ucwords(str_replace("_", " ",$case->value)) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="payment_method">Payment Method</label>
                    <select class="form-control" name="payment_method" id="payment_method">
                        @foreach(PaymentMethod::cases() as $case)
                        <option value="{{ $case->value }}">{{ ucwords(str_replace("_", " ",$case->value)) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="monthly_income">Monthly Income</label>
                    <input type="number" step="0.01" class="form-control" name="monthly_income" id="monthly_income" value="1250.24"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="next_pay_date">Next Pay Date</label>
                    <input type="date" class="form-control" name="next_pay_date" id="next_pay_date" value="2022-10-31"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="following_pay_date">Following Pay Date</label>
                    <input type="date" class="form-control" name="following_pay_date" id="following_pay_date"
                           value="2022-11-30"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="job_title">Job Title</label>
                    <input type="text" class="form-control" name="job_title" id="job_title" value="webmaster"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="employer_name">Employer Name</label>
                    <input type="text" class="form-control" name="employer_name" id="employer_name" value="mediablanket"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="employer_industry">Employer Industry</label>
                    <select class="form-control" name="employer_industry" id="employer_industry">
                        @foreach(EmployerIndustry::cases() as $case)
                        <option value="{{ $case->value }}">{{ ucwords(str_replace("_", " ",$case->value)) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="employment_start_date">Employment Start Date</label>
                    <input type="date" class="form-control" name="employment_start_date" id="employment_start_date"
                           value="2017-03-01"/>
                </div>

        </div>
        <div class="row">

            <div class="col-12">
                <h4 class="d-block mt-3" style="border-bottom:solid 1px #000;">Financials</h4>
            </div>

                <div class="form-group mb-3 col-6">
                    <label for="expenditure_housing">Expenditure Housing</label>
                    <input type="number" step="0.01" class="form-control" name="expenditure_housing" id="expenditure_housing"
                           value="50.75"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="expenditure_credit">Expenditure Credit</label>
                    <input type="number" step="0.01" class="form-control" name="expenditure_credit" id="expenditure_credit"
                           value="50.75"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="expenditure_transport">Expenditure Transport</label>
                    <input type="number" step="0.01" class="form-control" name="expenditure_transport" id="expenditure_transport"
                           value="50.75"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="expenditure_food">Expenditure Food</label>
                    <input type="number" step="0.01" class="form-control" name="expenditure_food" id="expenditure_food"
                           value="50.75"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="expenditure_utilities">Expenditure Utilities</label>
                    <input type="number" step="0.01" class="form-control" name="expenditure_utilities" id="expenditure_utilities"
                           value="50.75"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="expenditure_other">Expenditure Other</label>
                    <input type="number" step="0.01" class="form-control" name="expenditure_other" id="expenditure_other"
                           value="50.75"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="bank_name">Bank Name</label>
                    <select class="form-control" name="bank_name" id="bank_name">
                        @foreach(BankName::cases() as $case)
                        <option value="{{ $case->value }}">{{ ucwords(str_replace("_", " ",$case->value)) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="bank_account_number">Bank Account Number</label>
                    <input type="number" class="form-control" name="bank_account_number" id="bank_account_number"
                           value="12345678"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="bank_sort_code">Bank Sort Code</label>
                    <input type="text" class="form-control" name="bank_sort_code" id="bank_sort_code" value="12-34-56"/>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="bank_card_type">Bank Card Type</label>
                    <select class="form-control" name="bank_card_type" id="bank_card_type">
                        @foreach(BankCardType::cases() as $case)
                        <option value="{{ $case->value }}">{{ ucwords(str_replace("_", " ",$case->value)) }}</option>
                        @endforeach
                    </select>
                </div>

        </div>

        <div class="row">

            <div class="col-12">
                <h4 class="d-block mt-3" style="border-bottom:solid 1px #000;">Consent</h4>
            </div>

                <div class="form-group mb-3 col-6">
                    <label for="consent_email_sms">Consent Email Sms</label>
                    <select class="form-control" name="consent_email_sms" id="consent_email_sms">
                        <option value="1">Yes</option>
                        <option value="0" selected>No</option>
                    </select>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="consent_email">Consent Email</label>
                    <select class="form-control" name="consent_email" id="consent_email">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="consent_sms">Consent Sms</label>
                    <select class="form-control" name="consent_sms" id="consent_sms">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="consent_call">Consent Call</label>
                    <select class="form-control" name="consent_call" id="consent_call">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="consent_credit_search">Consent Credit Search</label>
                    <select class="form-control" name="consent_credit_search" id="consent_credit_search">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group mb-3 col-6">
                    <label for="consent_financial">Consent Financial</label>
                    <select class="form-control" name="consent_financial" id="consent_financial">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

        </div>

        <div class="row">
            <div class="form-group mb-3 col">
                <button type="submit" class="btn btn-primary" name="submit" value="true">Submit</button>
            </div>
        </div>

    </form>
@endsection
