    @extends('layouts.app')
    @section('content')
    <div class="admin-dashboard">
        <form action="{{route('admin.create.user')}}" method="POST">
            @csrf
            <h5>Create new user!</h5>
            <div class="input-field-wrapper">
                <div class="input-field">
                    <input type="text" class="user-email" name="email" required/>
                    <label for="user-email">User email</label>
                </div>
                <div class="input-field">
                    <input type="text" class="user-password" name="password" required />
                    <label for="user-password">User password</label>
                </div>
                <div class="input-field">
                    <select name="role">
                      <option value="user"  selected>User</option>
                      <option value="support">Support Engineer</option>
                      <option value="admin">Admin User</option>
                    </select>
                    <label>User type</label>
                </div>
            </div>

            <div class="form-footer">
                <button class="btn btn-flat btn-cancel" type="reset">CLEAR</button>
                <button class="btn btn-flat btn-create" type="submit">CREATE</button>
            </div>
            @isset($error)
            <div class="error-message">{{$error}}</div>
            @endisset
            @if(session('message'))
            <div class="success-message">{{session('message')}}</div>
            @endisset
        </form>
    </div>
</div>

<footer>
    <p class="center-align grey-text">&copy; 2019 TECHENFOLD</p>
</footer>
@endsection
        
