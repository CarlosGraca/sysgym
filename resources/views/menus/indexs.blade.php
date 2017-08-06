@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Menu
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
 Menu
@endsection


@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>

                <div class="panel-body">
                    @if(count($menus) > 0)
                        <table class="table table-responsive table-bordered">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Url</th>
                                <th>Icon</th>
                                <th>Estado</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menus as $menu)
                                <tr>
                                    <td>{!! $menu->title !!}</td>
                                    <td>{!! $menu->url !!}</td>
                                    <td>{!! $menu->icon !!}</td>
                                    <td>@if ($menu->status === 1)
                                            <span class="label label-success">Ativo</span>
                                        @elseif($menu->status === 0)
                                             <span class="label label-danger">Inativo</span>
                                        @endif
                                    </td>
                                    <td class="actions">
                                        <a href="{{ route('menus.edit',$menu->id) }}" class="btn btn-primary btn-xs", data-remote='true'])>      <i class="fa fa-edit"></i>
                                        </a>                           
                                         <button type="button" class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#confirmDelete" data-id="{{ $menu->id }}" data-name="{{ $menu->id }}" data-title="Confirma Alterar estado Menu" data-url="/menus/" title="Alterar Estado">
                                            <i class="fa fa-exchange"></i>
                                        </button> 
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="paginate">
                            {!! $menus->render() !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection