<div>

   <h1>Login</h1>

   <form action="/login1" method="POST">
       @csrf

       <div>
           <label for="email">Email:</label>
           <input type="email" id="email" name="email" value="{{ old('email') }}">
           @error('email')
               <span>{{$message}}</span>
           @enderror    
       </div>
        <br>
       <div>
           <label for="password">Senha:</label>
           <input type="password" id="password" name="password">
           @error('password')
               <span>{{$message}}</span>
           @enderror
       </div>
        <br>
       <button type="submit">Login</button>

   </form>

</div>
