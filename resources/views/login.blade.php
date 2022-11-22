<h1>User Login</h1>
<form action="/user" method="POST">
    @csrf
    <h3>Name : <input type="text" name="username" placeholder="Enter Name"> <br><br></h3>
    
    <h3>Password : <input type="password" name="userpassword" placeholder="Enter Password"> <br><br></h3>
    <button type="submit">Submit</button>
</form>