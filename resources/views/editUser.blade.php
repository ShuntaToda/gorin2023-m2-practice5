@include("header")

<div>
  <h2>edit user</h2>
  <div>
    <form action="{{ route('admin.edit', $user->id) }}" method="post">
      @csrf
      @method("put")
      
      <div>
        <span>name</span>
        <input type="text" required name="name" value="{{$user->name}}">
      </div>
      <div>
        <span>email</span>
        <input type="email" required name="email" value="{{$user->email}}">
      </div>
      <div>
        <span>memo</span>
        <input type="text" name="memo" value="{{$user->memo}}">
      </div>
      <div>
        <span>is active</span>
        <input type="checkbox" name="is_active" {{ $user->is_active ? "checked" : "" }}>
      </div>
      
      @if(session("message"))
      <div>{{ session("message") }}</div>
      @endif

      <button type="submit">submit</button>
    </form>
  </div>
</div>

@include("footer")