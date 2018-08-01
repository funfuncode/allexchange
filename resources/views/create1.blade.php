@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">

                <form action="{{action('PhotoController@store')}}" method="post">
                    {{Form::token()}}
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" id="type" placeholder="Enter type">
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        {{ Form::select('brand',  ['1', '2', '3', '4', '5', '6'], null,['class' => 'form-control', 'placeholder'=>'Brand']) }}
                    </div>

                    <div class="row my-4">
                        <div class="col-md-4">

                            <p id="dropzone1" class="dropzone"></p>
                            <p class="text-center">Вид спереди</p>

                        </div>

                        <div class="col-md-4">

                            <p id="dropzone2" class="dropzone"></p>
                            <p class="text-center">Вид сзади</p>

                        </div>

                        <div class="col-md-4">

                            <p id="dropzone3" class="dropzone"></p>
                            <p class="text-center">Вид сбоку</p>

                        </div>

                        <div class="col-md-3">

                            <p id="dropzone4" class="dropzone"></p>
                            <p class="text-center">Вид 4</p>

                        </div>

                        <div class="col-md-3">

                            <p id="dropzone5" class="dropzone"></p>
                            <p class="text-center">Вид 5</p>

                        </div>

                        <div class="col-md-3">

                            <p id="dropzone6" class="dropzone"></p>
                            <p class="text-center">Вид 6</p>

                        </div>
                        <div class="col-md-3">

                            <p id="dropzone7" class="dropzone"></p>
                            <p class="text-center">Вид 7</p>

                        </div>
                    </div>

                    <input class="btn btn-primary" id="submitAll" name="submit" type="submit"
                           value="Submit" />

                </form>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

    <script type="text/javascript">
        Dropzone.autoDiscover = false;

        $(function () {
            // Now that the DOM is fully loaded, create the dropzone, and setup the
            // event listeners
            var myDropzone1 = new Dropzone("#dropzone1", {
                url: "/file-upload",
                maxFiles: 5,
                dictDefaultMessage: "Загрузите вид устройства спереди"
            });
            var myDropzone2 = new Dropzone("#dropzone2", {
                url: "/file-upload",
                maxFiles: 1,
                dictDefaultMessage: "Загрузите вид устройства сзади"
            });
            var myDropzone3 = new Dropzone("#dropzone3", {
                url: "/file-upload",
                maxFiles: 1,
                dictDefaultMessage: "Загрузите вид устройства сбоку"
            });


            var myDropzone4 = new Dropzone("#dropzone4", {
                url: "/file-upload",
                maxFiles: 1,
                dictDefaultMessage: "Вид 4"
            });
            var myDropzone5 = new Dropzone("#dropzone5", {
                url: "/file-upload",
                maxFiles: 1,
                dictDefaultMessage: "Вид 5"
            });
            var myDropzone6 = new Dropzone("#dropzone6", {
                url: "/file-upload",
                maxFiles: 1,
                dictDefaultMessage: "Вид 6"
            });
            var myDropzone7 = new Dropzone("#dropzone7", {
                url: "/file-upload",
                maxFiles: 1,
                dictDefaultMessage: "Вид 7"
            });

        });
    </script>
@endsection
