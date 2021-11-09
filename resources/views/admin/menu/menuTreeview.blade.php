@extends('layouts.admin')
@section('content')
<div class="row">
   <div class="col-md-6">
      <div class="card">
         <div class="card-header">
            Add New Menu
         </div>

         <div class="card-body">
         <div class="row">
                  <div class="col-md-12">
                           <form accept="{{ route('admin.menus.store')}}" method="post">
                              @csrf
                              @if(count($errors) > 0)
                                       <div class="alert alert-danger  alert-dismissible">
                                          <button type="button" class="close" data-dismiss="alert">×</button>
                                          @foreach($errors->all() as $error)
                                                   {{ $error }}<br>
                                          @endforeach
                                       </div>
                                    @endif
                              @if ($message = Session::get('success'))
                                 <div class="alert alert-success  alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">×</button>   
                                       <strong>{{ $message }}</strong>
                                 </div>
                              @endif
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Title</label>
                                       <input type="text" name="title" class="form-control">   
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Slug</label>
                                       <input type="text" name="slug" class="form-control">   
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Parent</label>
                                       <select class="form-control" name="parent_id">
                                          <option selected disabled>Select Parent Menu</option>
                                          @foreach($allMenus as $key => $value)
                                             <option value="{{ $key }}">{{ $value}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <button class="btn btn-success">Save</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
         </div>
      </div>
   </div>

   <div class="col-md-6">
      <div class="card">
         <div class="card-header">
            Menu {{ trans('global.list') }}

            <form action="{{ route('admin.menus.clear') }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;" class="float-right">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-xs btn-danger" value="Clear All Menu">
                  </form>
         </div>

         <div class="card-body">
         <div class="row">
                  <div class="col-md-12">
                  
                        <ul id="tree1">
                           @foreach($menus as $menu)
                              <li>
                                 {{ $menu->title }}
                                 @if(count($menu->childs))
                                    @include('admin.menu.manageChild',['childs' => $menu->childs])
                                 @endif
                              </li>
                           @endforeach
                        </ul>
                  </div>
               </div>
         </div>
      </div>
   </div>
</div>
@endsection
