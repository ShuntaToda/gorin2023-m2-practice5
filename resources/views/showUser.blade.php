@include("header")

<div>
  <div>
    <h2>show user</h2>
    <div>
      <div>
        <span>id: </span>
        <span>{{ $user->id }}</span>
      </div>
      <div>
        <span>name: </span>
        <span>{{ $user->name }}</span>
      </div>
      <div>
        <span>email: </span>
        <span>{{ $user->email }}</span>
      </div>
      <div>
        <span>memo: </span>
        <span>{{ $user->memo }}</span>
      </div>
      <div>
        <span>role: </span>
        <span>{{ $user->role }}</span>
      </div>
      <div>
        <span>is active: </span>
        <span>{{ $user->is_active }}</span>
      </div>
    </div>
  </div>
</div>
@include("footer")