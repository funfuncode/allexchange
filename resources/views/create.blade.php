@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection

@section('content')
    <div class="container">

        <div class="col-md-12">

            <form action="{{action('PhotoController@store')}}" method="post">
                {{Form::token()}}
                <div class="form-group">
                    <label>Тип устройства</label>
                    {{ Form::select('device_type',  ['Phone' => 'Phone', 'Tablet' => 'Tablet', 'Gadget' => 'Gadget'], 0,['class' => 'form-control', 'placeholder'=>'Тип устройства']) }}
                </div>
                <div class="form-group">
                    <label>Бренд</label>
                    {{ Form::select('brand',  ['Apple', 'Samsung', 'Nomi', 'Xiaomi', 'Asus', 'LG'], 0,['class' => 'form-control', 'placeholder'=>'Бренд']) }}
                </div>

                <div class="form-group">
                    <label>Модель</label>
                    {{ Form::select('model',  ['A5', 'X10', 'F4', 'G7', 'D1', 'P15'], null,['class' => 'form-control', 'placeholder'=>'Модель']) }}
                </div>

                <div class="form-group">
                    <label>Категория</label>
                    {{ Form::select('category',  ['K1', 'K2', 'K3', 'K4', 'K5'], null,['class' => 'form-control', 'placeholder'=>'Категория']) }}
                </div>

                <div class="row my-4">
                    <div class="col-md-3">

                        <p id="dropzone1" class="dropzone"></p>
                        <p class="text-center">Вид спереди</p>

                    </div>

                    <div class="col-md-3">

                        <p id="dropzone2" class="dropzone"></p>
                        <p class="text-center">Вид сзади</p>

                    </div>

                    <div class="col-md-3">

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

                    <div class="col-md-3">

                        <p id="dropzone8" class="dropzone"></p>
                        <p class="text-center">Вид 8</p>

                    </div>
                </div>

                <input class="btn btn-primary" id="submitAll" name="submit" type="submit"
                       value="Submit"/>

            </form>

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
                url: "/allexchange/public/photos",
                maxFiles: 1,
                dictDefaultMessage: "Загрузите вид устройства спереди",
                paramName: "file1",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var myDropzone2 = new Dropzone("#dropzone2", {
                url: "/allexchange/public/photos",
                maxFiles: 1,
                dictDefaultMessage: "Загрузите вид устройства сзади",
                paramName: "file2",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var myDropzone3 = new Dropzone("#dropzone3", {
                url: "/allexchange/public/photos",
                maxFiles: 1,
                dictDefaultMessage: "Загрузите вид устройства сбоку",
                paramName: "file3",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var myDropzone4 = new Dropzone("#dropzone4", {
                url: "/allexchange/public/photos",
                maxFiles: 1,
                dictDefaultMessage: "Загрузите вид устройства сверху",
                paramName: "file4",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var myDropzone5 = new Dropzone("#dropzone5", {
                url: "/allexchange/public/photos",
                maxFiles: 1,
                dictDefaultMessage: "Загрузите фото 5",
                paramName: "file5",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var myDropzone6 = new Dropzone("#dropzone6", {
                url: "/allexchange/public/photos",
                maxFiles: 1,
                dictDefaultMessage: "Загрузите фото 6",
                paramName: "file6",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var myDropzone7 = new Dropzone("#dropzone7", {
                url: "/allexchange/public/photos",
                maxFiles: 1,
                dictDefaultMessage: "Загрузите фото 7",
                paramName: "file7",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var myDropzone8 = new Dropzone("#dropzone8", {
                url: "/allexchange/public/photos",
                maxFiles: 1,
                dictDefaultMessage: "Загрузите фото 8",
                paramName: "file8",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });
    </script>
@endsection
