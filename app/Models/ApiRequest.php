<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_lead','sub_id','aff_id','aff_password','referring_website','loan_amount','loan_purpose','loan_term','guarantor','title','first_name','middle_name','last_name','gender','date_of_birth','marital_status','number_of_dependents','street_name','city','county','post_code','residential_status','address_move_in_date','mobile_number','home_number','work_number','mobile_phone_type','email_address','employment_status','payment_frequency','payment_method','monthly_income','next_pay_date','following_pay_date','job_title','employer_name','employer_industry','employment_start_date','expenditure_housing','expenditure_credit','expenditure_transport','expenditure_food','expenditure_utilities','expenditure_other','bank_name','bank_account_number','bank_sort_code','bank_card_type','consent_email_sms','consent_email','consent_sms','consent_call','consent_credit_search','consent_financial','ip_address','user_agent','house_number',
    ];
}
