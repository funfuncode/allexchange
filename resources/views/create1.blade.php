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

    <script>
        $(function() {

            serviceUpdate();
            //serviceUpdate({{ old('service_id', $post->service_id) }});
            // Changement de pays
            $('select[name="service_name"]').on('change', function(e) {
                switchSelect('service_branch', true);
                switchSelect('service_city', true);
                switchSelect('service_address', true);
                serviceUpdate();
            });

            $('select[name="service_branch"]').on('change', function(e) {
                switchSelect('service_city', true);
                switchSelect('service_address', true);
                serviceUpdate();
            });


            $('select[name="service_city"]').on('change', function(e) {
                switchSelect('service_address', true);
                serviceUpdate();
            });

            /*
                        $('select[name="service_address"]').on('change', function(e) {
                            $('input[name="service_id"]').val($(this).val());
@if(Auth::check() && Auth::user()->is_admin())
            $('input[name="replaced"][value="1"]').prop("checked",true);
            replaced
@endif
            });
*/

            function serviceUpdate(service_id) {
                var param = {};

                service_id = service_id || 0;
                if(service_id) {
                    param.service_id = service_id;
                } else {
                    param.name = $('select[name="service_name"] option:checked').val();
                    param.branch = $('select[name="service_branch"] option:checked').val();
                    param.city = $('select[name="service_city"] option:checked').val();
                }


                $.ajax({
                    url: "{{ route('akb-service-ajax') }}",
                    type: "POST",
                    data: param,
                    beforeSend: function() {
                        $('#loading').show();
                    },
                    complete: function() {
                        $('#loading').hide();
                    },
                    error :function( jqXhr ) {
                        if( jqXhr.status === 401 ) //redirect if not authenticated user.
                            console.log('error 401');
                        // $( location ).prop( 'pathname', 'auth/login' );
                        if( jqXhr.status === 422 ) {
                            //process validation errors here.
                            var errors = jqXhr.responseJSON; //this will get the errors response data.
                            //show them somewhere in the markup
                            //e.g
                            var str = "";

                            $.each( errors, function( key, value ) {
                                str += '<li>' + value[0] + '</li>'; //showing only the first error.
                            });

                            $('#error-list').html('<p>Исправьте ошибки</p>')
                                .append('<ul>' + str + '</ul>').show(); // append the list
                        } else {
                            /// do some thing else
                        }
                    },
                    success: function( response ) {
                        if(response.errors) {
                            var str = "";
                            response.errors.forEach(function(error){
                                str += '<li>' + error + '</li>' // build the list
                            });
                            $('#error-list').html('<p>Исправьте ошибки</p>')
                                .append('<ul>' + str + '</ul>').show(); // append the list
                        } else {
                            $('#error-list').hide();
                            if(response.names){
                                serviceSet('service_name', response.names, service_id ? 1 : 0);
                            }
                            if(response.branches){
                                serviceSet('service_branch', response.branches, service_id ? 1 : 0);
                            }
                            if(response.cities){
                                serviceSet('service_city', response.cities, service_id ? 1 : 0);
                            }
                            if(response.addresses){
                                serviceSet('service_address', response.addresses, service_id ? 1 : 0);
                            }
                        }
                    }
                });
            }


            function switchSelect(el, disable) {
                if(disable) {
                    $('select[name="' + el + '"]').val(0).prop('selected', true).prop('disabled', 'disabled');
                } else {
                    $('select[name="' + el + '"]').prop('disabled', false);
                }
            }


            function serviceSet(elementId, data, itemId) {
                $('select[name="' + elementId+ '"]').empty();

                $.each(data, function(index, item) {
                    $('select[name="' + elementId + '"]').append($('<option>', {
                        value: index,
                        text : item
                    }));
                });

                if(itemId) {
                    if(elementId == 'service_name') {
                        var sNameId = $('input[name="service_name_id"]').val();
                        $('select[name="' + elementId+ '"]').val(sNameId).prop('selected', true);
                    }
                    else $('select[name="' + elementId+ '"] option:last').prop('selected', true);
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
