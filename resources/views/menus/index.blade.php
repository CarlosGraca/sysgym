@extends('layouts.app')

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
        @include('layouts.shared.alert') 
        <div class="col-lg-12">
            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">  {{ trans('adminlte_lang::message.menu_list') }} </h3>
                  <div class="pull-left box-tools">
                         <a href="{{ url('menus/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_menu') }}">
                              <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_menu') }}
                         </a>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                   {{--  @if(count($menus) > 0) --}}
                        <table class="table table-hover table-design">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Url</th>
                                <th>Icon</th>
                               
                                <th>Order</th>
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
                                   
                                    <td>{!! $menu->menu_order !!}</td>
                                    <td>@if ($menu->status === 1)
                                            <span class="label label-success">Ativo</span>
                                        @elseif($menu->status === 0)
                                             <span class="label label-danger">Inativo</span>
                                        @endif
                                    </td>
                                    <td class="actions">
                                        <a href="{{ route('menus.edit',$menu->id) }}" class="btn btn-primary btn-xs", data-remote='false'])>      <i class="fa fa-edit"></i>
                                        </a>                           
                                         <button type="button" class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#confirmDelete" data-id="{{ $menu->id }}" data-name="{{ $menu->id }}" data-title="Confirma Alterar estado Menu" data-url="/menus/" title="Alterar Estado">
                                            <i class="fa fa-exchange"></i>
                                        </button> 
                                    </td>
                                </tr>
                             @endforeach 
                            </tbody>
                        </table>
{{--                         <div class="paginate">
                            {!! $menus->render() !!}
                        </div> 
                    @endif--}}
                </div>
            </div>
        </div>
    </div>
@endsection