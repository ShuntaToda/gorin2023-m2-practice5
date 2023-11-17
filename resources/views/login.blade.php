@include("header")

<div>
  <h2>login</h2>
  <div>
    <form action="{{ route('login') }}" method="post">
      @csrf
      <div>
        <span>name</span>
        <input type="text" name="name">
      </div>
      <div>
        <span>password</span>
        <input type="password" name="password">
      </div>
      @if($errors->first())
        <div>入力に間違いがあります</div>
      @endif
      @if(session("message"))
        <div>{{session("message")}}</div>
      @endif
      <button type="submit">submit</button>
    </form>
  </div>
</div>

@include("footer")