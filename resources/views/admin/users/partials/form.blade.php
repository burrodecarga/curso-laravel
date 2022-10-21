@csrf
<div class="card">
    <div class="card-header">
        <strong>{{$user->name}}</strong><hr>
        <strong>Roles:</strong>


    </div>
    <div class="card-body">
            <div class="row p-3">
                @foreach ($roles as $key => $p)
                <div class="form-check col-md-3">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="roles[]" id="roles" value="{{ $p->name }}"
                            {{  ($userRoles->contains($p->id) ? "checked" : "") }}>{{$p->name}}
                    </label>
                </div>
                @endforeach
            </div>
        <hr>
        <button class="btn btn-success text-capitalize">{{__($btn)}}</button>
        <a href="{{route('admin.users.index')}}" class="btn btn-info mt-2 mb-2 text-capitalize">{{__('back')}} </a>
    </div>
</div>
</div>
