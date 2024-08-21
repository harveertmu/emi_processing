@extends('admin.layout.head')


@section('content')
<div class="right_col" role="main" style="min-height: 622px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Loan <small>Managment</small></h3>
            </div>


            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="row" style="display: block;">
            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Loan<small>List</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a id="create-table-btn"></a><i class="fa fa-plus">Process Data.</i></a>
                          
                        </ul>
                        
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <!-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> -->
                        
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title" style="display: table-cell;">Client ID</th>
                                        <th class="column-title" style="display: table-cell;">Number of Payments</th>
                                        <th class="column-title" style="display: table-cell;">First Payment Date</th>
                                        <th class="column-title" style="display: table-cell;">Last Payment Date</th>
                                        <th class="column-title" style="display: table-cell;">Loan Amount</th>

                                    
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($loanDetails as $loan)
                                    <tr>
                                        <td>{{ $loan->clientid }}</td>
                                        <td>{{ $loan->num_of_payment }}</td>
                                        <td>{{ $loan->first_payment_date }}</td>
                                        <td>{{ $loan->last_payment_date }}</td>
                                        <td>${{ number_format($loan->loan_amount, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
<script>

$('#create-table-btn').click(function() {
    alert('test');
            $.ajax({
                url: "{{ route('create.table') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    alert(response.message);
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseJSON.message);
                }
            });
        });
</script>