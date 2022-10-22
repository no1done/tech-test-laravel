<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_requests', function (Blueprint $table) {
            $table->id();
            $table->string('referring_website');
            $table->unsignedFloat('loan_amount');
            $table->string('loan_purpose');
            $table->integer('loan_term');
            $table->string('guarantor');
            $table->string('title');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('marital_status');
            $table->integer('number_of_dependents');
            $table->string('street_name');
            $table->string('city');
            $table->string('county');
            $table->string('post_code');
            $table->string('residential_status');
            $table->date('address_move_in_date');
            $table->string('mobile_number');
            $table->string('home_number');
            $table->string('work_number');
            $table->string('mobile_phone_type');
            $table->string('email_address');
            $table->string('employment_status');
            $table->string('payment_frequency');
            $table->string('payment_method');
            $table->unsignedFloat('monthly_income');
            $table->date('next_pay_date');
            $table->date('following_pay_date');
            $table->string('job_title');
            $table->string('employer_name');
            $table->string('employer_industry');
            $table->date('employment_start_date');
            $table->unsignedFloat('expenditure_housing');
            $table->unsignedFloat('expenditure_credit');
            $table->unsignedFloat('expenditure_transport');
            $table->unsignedFloat('expenditure_food');
            $table->unsignedFloat('expenditure_utilities');
            $table->unsignedFloat('expenditure_other');
            $table->string('bank_name');
            $table->string('bank_account_number');
            $table->string('bank_sort_code');
            $table->string('bank_card_type');
            $table->boolean('consent_email_sms');
            $table->boolean('consent_email');
            $table->boolean('consent_sms');
            $table->boolean('consent_call');
            $table->boolean('consent_credit_search');
            $table->boolean('consent_financial');
            $table->string('ip_address');
            $table->string('user_agent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_requests');
    }
};
