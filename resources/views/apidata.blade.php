
<h1> User data<h1>

    <table border="1">
        <tr>
            <td>Id</td>
            <td>First_Name</td>
            <td>Last_Name</td>
            <td>Email</td>
            <td>profile Photo</td>
        </tr>
        @foreach($collection  as $users)
            <td>
                {{$users['id'] }}

            </td>
            <td>
                {{$users['first_name'] }}
            </td>
            <td>
                {{$users['last_name'] }}
            </td>
            <td>
                {{$users['email'] }}
            </td>
            <td>
               <img src="{{$users['avatar'] }}"/>
            </td>
        </tr>
        @endforeach



    </table>

