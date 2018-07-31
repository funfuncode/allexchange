@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form action="{{action('PhotoController@store')}}" method="post">
                        {{Form::token()}}
                        <div class="form-group">
                            <label>Type</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Brand</label>
                            {{ Form::select('brand',  ['1', '2', '3'], null,['class' => 'form-control', 'placeholder'=>'Brand']) }}
                        </div>

                        <div class="form-group">
                            <label>Photos</label>
                            <input type="file" id="drop1">
                        </div>

                        <input class="btn btn-primary" id="submitAll" name="submit" type="submit" value="Submit"></button>

                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

    <script type="text/javascript">
        var myDropzone = new Dropzone("#drop1");
    </script>
@endsection
