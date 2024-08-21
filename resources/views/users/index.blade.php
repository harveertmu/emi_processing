@extends('admin.layout.head')


@section('content')
<div class="right_col" role="main" style="min-height: 622px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Users <small>Managment</small></h3>
            </div>
           

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                @endif

        <div class="row" style="display: block;">
         <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Users<small>List</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="" href="{{ route('users.create') }}"><i class="fa fa-plus">Add</i></a>
                            <!-- </li> -->
                            <!-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Add</a>
                                    <a class="dropdown-item" href="#">Remove</a>
                                </div>
                            </li> -->
                            <!-- <li><a class="close-link"><i class="fa fa-close"></i></a> -->
                            <!-- </li> -->
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <!-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p> -->

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <!-- <th>
                                            <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                        </th> -->
                                        <th class="column-title" style="display: table-cell;">Sr.No. </th>
                                        <th class="column-title" style="display: table-cell;">Name </th>
                                        <th class="column-title" style="display: table-cell;">Email </th>
                                        <th class="column-title" style="display: table-cell;">Role </th>
                                        <th class="column-title" style="display: table-cell;">Status </th>
                                        <th class="column-title no-link last" style="display: table-cell;"><span class="nobr">Action</span>
                                        </th>
                                        <th class="bulk-actions" colspan="7" style="display: none;">
                                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt">1 Records Selected</span> ) <i class="fa fa-chevron-down"></i></a>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach ($data as $key => $user)
                                    <tr class="even pointer">
                                        <!-- <td class="a-center ">
                                            <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                        </td> -->
                                        <td class=" ">{{ ++$i }}</td>
                                        <td class=" ">{{ $user->name }} </td>
                                        <td class=" ">{{ $user->email }} <i class="success fa fa-long-arrow-up"></i></td>
                                        <td class=" ">  @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class=" ">Active</td>
                                        <td class=" last">
                                        <!-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a> -->
                                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                           
                                        </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection