<div>
<div class="card">
    <div class="card-header">
        <input type="text" class="form-control w-100" placeholder="Search Name" wire:model='search' wire:keydown="$set('page',1)">
    </div>
    <div class="card-body">
@if ($users->count())

<table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>roles</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->getRoleNames()->join(' ,')}}</td>
                    <td>
                        <a href="{{route('admin.users.show',$user->id)}}"
                            class="btn btn-outline-primary text-capitalize" data-toggle="tooltip"
                            data-placement="top" title="{{__('show record')}} ">

                            <i class="fa fa-list" aria-hidden="true"></i>
                        </a>
                        <a href="{{route('admin.users.edit',$user->id)}}"
                            class="btn btn-outline-success text-capitalize" data-toggle="tooltip"
                            data-placement="top" title="{{__('edit record')}} ">

                            <i class="fa fa-wrench" aria-hidden="true"></i>
                        </a>

                        <a class="btn btn-outline-danger text-capitalize" href="#" onclick="event.preventDefault();
                                     document.getElementById('delete-form').submit();"
                            data-toggle="tooltip" data-placement="top" title="{{__('delete record'.$user->name)}} ">

                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                        <form id="delete-form" action="{{route('admin.users.destroy',$user->id)}}"
                            method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
<strong>No matches</strong>
        @endif



    </div>
    <div class="m-4">
        {{$users->links()}}
    </div>
</div>
</div>
