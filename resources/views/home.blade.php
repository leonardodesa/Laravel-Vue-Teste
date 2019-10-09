@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3 style="margin-bottom:0">Seja bem-vindo {{ ucwords(strtolower($nameParts[0])) }}.</h3></div>

                <div class="card-body" style="padding: 1.25rem 0 0 1.25rem;">
                    <buttons-component></buttons-component>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
