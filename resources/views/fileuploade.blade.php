<h1>
uploade file
</h1>

<form action="upload" method="POST" enctype="multipart/form-data" >

    @csrf
    <input type="file" name="file"><br><br>
    <button type="submit" >upload file</button>

</form>
