@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Seja bem-vindo {{ strtolower($userName) }}</div>

                <div class="card-body">
                    <buttons-component></buttons-component>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
