@include("header")

<div>
  <h2>create user</h2>
  <div>
    <form action="{{ route('admin.create') }}" method="post">
      @csrf
      <div>
        <span>name</span>
        <input type="text" required name="name">
      </div>
      <div>
        <span>email</span>
        <input type="email" required name="email">
      </div>
      <div>
        <span>memo</span>
        <input type="text" name="memo">
      </div>
      <div>
        <span>password</span>
        <input type="password" name="password">
      </div>
      <div>
        <span>password confirmation</span>
        <input type="password" name="password_confirmation">
      </div>
      @if(session("message"))
      <div>{{ session("message") }}</div>
      @endif
      <button type="submit">submit</button>
    </form>
  </div>
</div>

@include("footer")