@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection

@section('content')
    <div class="container">

        <div class="col-md-12">

            <form action="{{action('PostsController@store')}}" method="post">
                {{Form::token()}}
                <div class="form-group">
                    <label>Тип устройства</label>
                    <select name="device_type" class="form-control">
                        <option>Phone</option>
                        <option>Tablet</option>
                        <option>Gadget</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Бренд</label>
                    {{ Form::select('brand',  [], 0,['class' => 'form-control', 'placeholder'=>'Бренд']) }}
                </div>

                <div class="form-group">
                    <label>Модель</label>
                    {{ Form::select('model',  [], null,['class' => 'form-control', 'placeholder'=>'Модель']) }}
                </div>

                <div class="form-group">
                    <label>Категория</label>
                    {{ Form::select('category',  [], null,['class' => 'form-control', 'placeholder'=>'Категория']) }}
                </div>

                <div class="row my-4">
                    <div class="col-md-3">

                        <p id="dropzone1" class="dropzone"></p>
                        <p class="text-center photoDescription"></p>

                    </div>

                    <div class="col-md-3">

                        <p id="dropzone2" class="dropzone"></p>
                        <p class="text-center photoDescription">Вид сзади</p>

                    </div>

                    <div class="col-md-3">

                        <p id="dropzone3" class="dropzone"></p>
                        <p class="text-center photoDescription">Вид сбоку</p>

                    </div>

                    <div class="col-md-3">

                        <p id="dropzone4" class="dropzone"></p>
                        <p class="text-center photoDescription">Вид 4</p>

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

            //const url = "/allexchange/public/photos";
            const url = "/photos";
            const xsrf_token_headers = {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};

            const isChrome = !!window.chrome && !!window.chrome.webstore;
            const isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
            const isChromeOpera = isChrome || isOpera;

            const dictDefaultMessage = "Перетащите фото устройства ";
            const dictRemoveFile = "Удалить файл";

            const photoDescription = "Фото устройства ";

            var myDropzone1 = new Dropzone("#dropzone1", {
                url: url,
                clickable: !isChromeOpera,
                maxFiles: 1,
                addRemoveLinks: true,
                dictDefaultMessage: dictDefaultMessage + "спереди",
                dictRemoveFile: dictRemoveFile,
                paramName: "file1",
                headers: xsrf_token_headers
            });

            let i = 1;

            myDropzone1.on("success", function(file, serverResponse) {
                $(`#dropzone${i}`).siblings(".photoDescription").text(photoDescription + "спереди");
            });

            myDropzone1.on("removedfile", (file) => {
                $(`#dropzone${i}`).siblings(".photoDescription").text("");
            });





            var myDropzone2 = new Dropzone("#dropzone2", {
                url: url,
                maxFiles: 1,
                dictDefaultMessage: dictDefaultMessage + "сзади",
                paramName: "file2",
                headers: xsrf_token_headers
            });

            var myDropzone3 = new Dropzone("#dropzone3", {
                url: url,
                maxFiles: 1,
                dictDefaultMessage: dictDefaultMessage + "сбоку",
                paramName: "file3",
                headers: xsrf_token_headers
            });

            var myDropzone4 = new Dropzone("#dropzone4", {
                url: url,
                maxFiles: 1,
                dictDefaultMessage: dictDefaultMessage + "сверху",
                paramName: "file4",
                headers: xsrf_token_headers
            });


            var myDropzone5 = new Dropzone("#dropzone5", {
                url: url,
                maxFiles: 1,
                dictDefaultMessage: dictDefaultMessage + "спереди 2",
                paramName: "file5",
                headers: xsrf_token_headers
            });

            var myDropzone6 = new Dropzone("#dropzone6", {
                url: url,
                maxFiles: 1,
                dictDefaultMessage: dictDefaultMessage + "сзади 2",
                paramName: "file6",
                headers: xsrf_token_headers
            });

            var myDropzone7 = new Dropzone("#dropzone7", {
                url: url,
                maxFiles: 1,
                dictDefaultMessage: dictDefaultMessage + "сбоку 2",
                paramName: "file7",
                headers: xsrf_token_headers
            });

            var myDropzone8 = new Dropzone("#dropzone8", {
                url: url,
                maxFiles: 1,
                dictDefaultMessage: dictDefaultMessage + "сверху 2",
                paramName: "file8",
                headers: xsrf_token_headers
            });

        });
    </script>


    <script>
        $(function () {

            //serviceUpdate();

            switchSelect('brand', true);
            switchSelect('model', true);
            switchSelect('category', true);


            $('select[name="device_type"]').on('change', function (e) {
                switchSelect('brand', true);
                switchSelect('model', true);
                switchSelect('category', true);
                //serviceUpdate();
            });

            $('select[name="brand"]').on('change', function (e) {
                switchSelect('model', true);
                switchSelect('category', true);
                //serviceUpdate();
            });


            $('select[name="model"]').on('change', function (e) {
                switchSelect('category', true);
                //serviceUpdate();
            });


            function serviceUpdate() {
                var param = {};

                param.name = $('select[name="service_name"] option:checked').val();
                param.branch = $('select[name="service_branch"] option:checked').val();
                param.city = $('select[name="service_city"] option:checked').val();


                $.ajax({
                    url: "/",
                    type: "POST",
                    data: param,
                    beforeSend: function () {
                        $('#loading').show();
                    },
                    complete: function () {
                        $('#loading').hide();
                    },
                    error: function (jqXhr) {
                        if (jqXhr.status === 401) //redirect if not authenticated user.
                            console.log('error 401');
                        // $( location ).prop( 'pathname', 'auth/login' );
                        if (jqXhr.status === 422) {
                            //process validation errors here.
                            var errors = jqXhr.responseJSON; //this will get the errors response data.
                            //show them somewhere in the markup
                            //e.g
                            var str = "";

                            $.each(errors, function (key, value) {
                                str += '<li>' + value[0] + '</li>'; //showing only the first error.
                            });

                            $('#error-list').html('<p>Исправьте ошибки</p>')
                                .append('<ul>' + str + '</ul>').show(); // append the list
                        } else {
                            /// do some thing else
                        }
                    },
                    success: function (response) {
                        if (response.errors) {
                            var str = "";
                            response.errors.forEach(function (error) {
                                str += '<li>' + error + '</li>' // build the list
                            });
                            $('#error-list').html('<p>Исправьте ошибки</p>')
                                .append('<ul>' + str + '</ul>').show(); // append the list
                        } else {
                            $('#error-list').hide();
                            if (response.brands) {
                                serviceSet('brand', response.brands, service_id ? 1 : 0);
                            }
                            if (response.models) {
                                serviceSet('model', response.models, service_id ? 1 : 0);
                            }
                            if (response.categories) {
                                serviceSet('category', response.categories, service_id ? 1 : 0);
                            }

                        }
                    }
                });
            }


            function switchSelect(el, disable) {
                if (disable) {
                    $('select[name="' + el + '"]').val(0).prop('selected', true).prop('disabled', 'disabled');
                } else {
                    $('select[name="' + el + '"]').prop('disabled', false);
                }
            }


            function serviceSet(elementId, data, itemId) {
                $('select[name="' + elementId + '"]').empty();

                $.each(data, function (index, item) {
                    $('select[name="' + elementId + '"]').append($('<option>', {
                        value: index,
                        text: item
                    }));
                });

                if (itemId) {
                    if (elementId == 'service_name') {
                        var sNameId = $('input[name="service_name_id"]').val();
                        $('select[name="' + elementId + '"]').val(sNameId).prop('selected', true);
                    }
                    else $('select[name="' + elementId + '"] option:last').prop('selected', true);
                } else {
                    $('input[name="service_id"]').val(0);
                }
                switchSelect(elementId, false);
            }

        });


        //turn on the tooltip function
        /*  $('[data-toggle="tooltip"]').tooltip(); */

    </script>
@endsection
