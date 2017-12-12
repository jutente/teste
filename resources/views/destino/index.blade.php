@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
	        @if(Session::has('deleted_destino')) 
	        <div class="alert alert-info">
	            <a href="#" class="close" data-dismiss="alert" aria-label="Fechar">&times;</a>
	            <strong>Info!</strong> {{ session('deleted_destino') }}
	        </div>
	        @endif
	        @if(Session::has('create_destino')) 
	        <div class="alert alert-info">
				<a href="#" class="close" data-dismiss="alert" aria-label="Fechar">&times;</a>
	            <strong>Info!</strong> {{ session('create_destino') }}
	        </div>
	        @endif
	        <div class="panel panel-default">
	            <div class="panel-heading">
					<div class="row">
					  <div class="col-sm-4">
					  	Destinos
					  </div>
					  <div class="col-sm-8 text-right">
					  	<div class="btn-group btn-group-xs">					  		
					  	
					  		<div class="btn-group">
								<a href="{{route('destino.create')}}" class="btn btn-primary btn-md" role="button">Adicionar</a>
							  
							</div>
					  	</div>					  	
					  </div>
					</div>
				</div>	
				<br>
	            <div class="table-responsive">
	                <table class="table table-striped">
	                    <thead>
	                    <tr>
	                        <th>Servidor</th>	                       
							<th>Setor Desejado</th>
							<th>Protocolo</th>
							<th>Data Cadastro</th>
	                        <th></th>
	                    </tr>
	                    </thead>
                        @isset($destinos)
                            <tbody>

                            @foreach($destinos as $destino)
                            <tr>
                                <td>{{$destino->servidor->servidor}}</td>
                                <td>{{$destino->setor}}</td>
                                <td>{{$destino->protocolo}}</td>

                                @if (isset($destino->dtcadastro))
                                    <td>{{\Carbon\Carbon::parse($destino->dtcadastro)->format('d/m/Y')}}</td>
                                @else                      		
                                <td></td>
                                @endif
                                
                                <td style="text-align: right">
                                    <a href="{{route('destino.edit', $destino->iddestino)}}" class="btn btn-default btn-xs" role="button"><span class="glyphicon glyphicon-pencil"></span>Alterar</a>
                                
                                    <a href="{{route('destino.show', $destino->iddestino)}}" class="btn btn-default btn-xs" role="button"><span class="glyphicon glyphicon-trash"></span>Excluir</a>
                                </td>
                            </tr>    
                            @endforeach                                                 
                            </tbody>
                    
	                </table>                          
	          
                @endisset
	        </div>    
    	</div>
    </div>
</div>

<div id="modalFilter" class="modal fade" role="dialog">
	<div class="modal-dialog">
	    <div class="modal-content">
	    	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">Filtro</h4>
	      	</div>
	      	<div class="modal-body style="padding:40px 50px;"">
	      		<div class="container-fluid">
                    <div class="row">                                         
                        {!! Form::open(['method'=>'GET','url'=>route('destino.index')])  !!}
                        <br>                         
                        <div class="form-group">
                            {{ Form::label('servidor', 'Servidor:') }}
                            {{ Form::text('servidor', '', ['class' => 'form-control', 'placeholder' => 'Nome do servidor...']) }}   
                        </div>
						                     
                        <div class="form-group">
                            {{ Form::submit('Buscar', ['class' => 'btn btn-default btn-sm']) }}
                            <a href="{{ route('destino.index') }}" class="btn btn-default btn-sm" role="button">Limpar</a>
                        </div>
                        {!! Form::close() !!} 
                    </div>            
                </div>
	        	
	      	</div>
	    	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	    	</div>
		</div>
	</div>
</div>

@endsection

@section('script-footer')
<script>

</script>

@endsection
