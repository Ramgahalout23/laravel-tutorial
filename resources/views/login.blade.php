<h1>
    User login
</h1>
<form action="users" method="POST">
    @csrf
    <input type="text" name="user" placeholder=" Enter user name " ><br><br>
    <input type="password " name="password" placeholder="Enter paasword">
    <button type="submit">login</button>
</form>
