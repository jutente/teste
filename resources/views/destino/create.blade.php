@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{route('destino.index')}}">Destino</a> - Novo Registro</div>
                <br>
                {!! Form::open(['method' => 'post', 'url' => route('destino.store'), 'class' => 'form-horizontal']) !!}
                
              

                <div class="form-group {{ $errors->has('nome') ? ' has-error' : '' }}">
                    {{ Form::label('setor', 'Setor:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {!! Form::select('idsetor', $setors, null, ['placeholder' => 'Escolha um setor...', 'class' => 'form-control']) !!}
                        
                        @if ($errors->has('setor'))
                            <span class="help-block">
                                <strong>{{$errors->first('setor')}}</strong>
                            </span>
                        @endif
                    </div>    
                </div>

                <!--  Protocolo -->
                <div class="form-group {{ $errors->has('protocolo') ? ' has-error' : '' }}">
                    {{ Form::label('protocolo', 'Protocolo:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::text('protocolo', now(), ['class' => 'form-control text-uppercase']) }}
                        @if ($errors->has('protocolo'))
                            <span class="help-block">
                                <strong>{{$errors->first('protocolo')}}</strong>
                            </span>
                        @endif
                    </div>    
                </div>

                <!-- Data do Cadastro -->
                <div class="form-group {{ $errors->has('dtcadastro') ? ' has-error' : '' }}">
                    {{ Form::label('dtcadastro', 'Data do Cadastro:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::date('dtcadastro', \Carbon\Carbon::now(), ['class' => 'form-control', 'readonly']) }}
                        @if ($errors->has('dtcadastro'))
                            <span class="help-block">
                                <strong>{{$errors->first('dtcadastro')}}</strong>
                            </span>
                        @endif
                    </div>    
                </div>

             
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {{ Form::submit('Incluir', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>

                {!! Form::close() !!}  

            </div>
            <a href="{{route('destino.index')}}" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>  
        </div>
    </div>
</div>
@endsection