
<html>
    <head><title>
        form test</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>

<form method="POST" action="usepdf">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email">
      </div>
      <div class="form-group col-md-6">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
    </div>
    <div class="form-group col-md-6">
      <label>Address</label>
      <input type="text" class="form-control" name="address" placeholder="1234 Main St">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>City</label>
        <input type="text" class="form-control" name="city">
      </div>
      </div>
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
  </form>
