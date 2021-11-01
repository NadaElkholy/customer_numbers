@extends('layouts.app')

@section('content')
	<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customers</h1>
                </div>
            </div>
            <div class="card">

                {!! Form::open(['route' => 'customers.index', 'method' => 'get']) !!}

                <div class="card-body">

                    <div class="row">
                        <!-- Country Field -->
                        <div class="form-group col-sm-5">
                            {!! Form::label('country', 'Country:') !!}
                            {!! Form::select('country', [''=>'Select...','Cameroon'=>'Cameroon','Ethiopia'=>'Ethiopia','Morocco'=>'Morocco','Mozambique'=>'Mozambique','Uganda'=>'Uganda'], (isset($_GET['country'])? $_GET['country'] : ''), ['class' => 'form-control','maxlength' => 50,'maxlength' => 50,'maxlength' => 50]) !!}
                        </div>

                        <!-- State Field -->
                        <div class="form-group col-sm-5">
                            {!! Form::label('state', 'State:') !!}
                            {!! Form::select('state', [''=>'Select...','OK'=>'Valid','NOK'=>'Invalid',''=>'Select...'], (isset($_GET['state'])? $_GET['state'] : ''), ['class' => 'form-control','maxlength' => 50,'maxlength' => 50,'maxlength' => 50]) !!}
                        </div>


                        <div class="form-group col-sm-2 pt-4">
                            {!! Form::submit('Filter', ['class' => 'btn btn-primary']) !!}
                        </div>


                    </div>

                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </section>

    <div class="content px-3">

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-2">

					     @include('customers.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('page_scripts')

<script type="text/javascript">
$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>

@endpush