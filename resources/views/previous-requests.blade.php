<h3>Previous Requests</h3>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Loan Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($api_requests as $req)
                <tr>
                    <td>{{ $req->first_name }} {{ $req->last_name }}</td>
                    <td>{{ $req->email_address }}</td>
                    <td>{{ $req->loan_amount }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
