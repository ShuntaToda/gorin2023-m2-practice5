@include("header")

@can("admin")
<div>admin</div>
@endcan


@if(session("message"))
  <div>{{session("message")}}</div>
@endif
<table>
  <thead>
    <tr>
      <th>id</th>
      <th>name</th>
      <th>email</th>
      <th>role</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->role }}</td>
      <td>
        <div>
          <a href="{{ route('admin.show', $user->id) }}">表示</a>
          @if($user->role !== "admin")
          <a href="{{ route('admin.edit', $user->id) }}">編集</a>
          <form action="{{ route('admin.delete', $user->id) }}" method="post">
            @csrf
            @method("delete")
            <button type="submit">削除</button>
          </form>
          @endif
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<a href="{{ route('admin.create') }}">create user</a>

@include("footer")