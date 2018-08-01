@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-3">

                <form method="post" class="dropzone" id="dropzone1">
                    {{Form::token()}}

                </form>
            </div>

            <div class="col-md-3">

                <form method="post" class="dropzone" id="dropzone2">
                    {{Form::token()}}

                </form>
            </div>

            <div class="col-md-3">

                <form method="post" class="dropzone" id="dropzone3">
                    {{Form::token()}}

                </form>
            </div>

            <div class="col-md-3">

                <form method="post" class="dropzone" id="dropzone4">
                    {{Form::token()}}

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
                url: "/photos",
                maxFiles: 1,
                dictDefaultMessage: "Загрузите вид устройства спереди",
                paramName: "file1"
            });

            var myDropzone2 = new Dropzone("#dropzone2", {
                url: "/photos",
                maxFiles: 1,
                dictDefaultMessage: "Загрузите вид устройства сзади",
                paramName: "file2"
            });

            var myDropzone3 = new Dropzone("#dropzone3", {
                url: "/photos",
                maxFiles: 1,
                dictDefaultMessage: "Загрузите вид устройства сбоку",
                paramName: "file3"
            });

            var myDropzone4 = new Dropzone("#dropzone4", {
                url: "/photos",
                maxFiles: 1,
                dictDefaultMessage: "Загрузите вид устройства сверху",
                paramName: "file4"
            });



            /*var myDropzone1 = new Dropzone("#dropzone1", {
                url: "/photos",
                maxFiles: 1,
                dictDefaultMessage: "Загрузите вид устройства спереди",
                paramName: "file1"
            });
            var myDropzone2 = new Dropzone("#dropzone2", {
                url: "/photos",
                maxFiles: 1,
                dictDefaultMessage: "Загрузите вид устройства сзади",
                paramName: "file2"
            });
            var myDropzone3 = new Dropzone("#dropzone3", {
                url: "/photos",
                maxFiles: 1,
                dictDefaultMessage: "Загрузите вид устройства сбоку",
                paramName: "file3"
            });


            var myDropzone4 = new Dropzone("#dropzone4", {
                url: "/photos",
                maxFiles: 1,
                dictDefaultMessage: "Вид 4"
            });
            var myDropzone5 = new Dropzone("#dropzone5", {
                url: "/photos",
                maxFiles: 1,
                dictDefaultMessage: "Вид 5"
            });
            var myDropzone6 = new Dropzone("#dropzone6", {
                url: "/photos",
                maxFiles: 1,
                dictDefaultMessage: "Вид 6"
            });
            var myDropzone7 = new Dropzone("#dropzone7", {
                url: "/photos",
                maxFiles: 1,
                dictDefaultMessage: "Вид 7"
            });*/

        });
    </script>
@endsection
