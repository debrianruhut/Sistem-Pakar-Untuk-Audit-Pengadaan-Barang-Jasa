<div class="card-body">
    <div class="form-group">
        <label for="name">Full name</label>
        <input type="text" name="name" value="@if(!empty($user)){{$user->name}}@endif" class="form-control" required="" autofocus="">
        <!-- {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus' ]) !!} -->
            @if ($errors->has('name'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" value="@if(!empty($user)){{$user->email}}@endif" class="form-control" required="" autofocus="">
        <!-- {!! Form::email('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'required' ]) !!} -->
            @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" value="" class="form-control" required="" autofocus="">
        <!-- {!! Form::password('password', ['class' => $errors->has('password') ? 'form-control is-invalid' : 'form-control' ]) !!} -->
            @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
    </div> 
    <div class="form-group">
        <label for="role">Role</label>
        <select id="roles" class="form-control" name="role" required="" autofocus="">
            <option value='' selected>--- Pilih Role ---</option>
            @foreach($role as $key => $item)
            <option value='{{$item->id}}' @if(!empty($user)) @if($user->role_id==$item->id) selected @endif @endif>{{$item->nama_role}}</option>
            @endforeach
        </select> 
        <!-- {!! Form::select('role', ['admin' => 'Admin', 'author' => 'Author'], null, ['class' => $errors->has('role') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus' ]) !!} -->
            @if ($errors->has('role'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('role') }}</strong>
            </span>
            @endif
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <div class="input-group">
        <span class="input-group-btn">
            <a id="lfm" data-input="avatar" data-preview="holder" class="btn btn-primary text-white">
                <i class="fa fa-cloud-upload"></i>  choose
            </a>
        </span>
        {!! Form::text('avatar', null, ['id' => 'avatar', 'class' => $errors->has('avatar') ? 'form-control is-invalid' : 'form-control', 'readonly']) !!}
            @if ($errors->has('avatar'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('avatar') }}</strong>
            </span>
            @endif
    </div>
<img id="holder" style="margin-top:15px;max-height:254px;max-width:152px;">
</div>
</div>
<div class="card-footer bg-transparent">
    <button class="btn btn-primary" type="submit">Simpan</button>
    <a class="btn btn-default" href="{{url('admin/users')}}">Kembali</a>
</div>
@section('assets-bottom')
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
    $(document).ready( function () {
        var domain = "{{url('/')}}/laravel-filemanager";
        $('#lfm').filemanager('image',{prefix: domain});
    });
</script>
@endsection