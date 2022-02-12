@extends('layouts.app', ['title' => __('Success'), 'pageSlug' => 'notifications'])

@section('content')
    <div class="row justify-content-center mt-5 pt-5">
        <div class="col-md-6 text-center">
            <div class="card bg-transparent">
                <div class="card-body alert alert-success p-5">
                    <div class="bg-transparent alert-with-icon" data-notify="container">
                        <span  class="d-block tim-icons icon-check-2 mb-3" style="font-size: 32px"></span>
                        <h3 class="text-white mb-0" >L'opération est terminée avec succès</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
