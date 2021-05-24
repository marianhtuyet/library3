<!DOCTPE html>
<html>
@include('layouts.interface')
<body>
@include('layouts.header')
<table border = "1">
    <tr>
        <td>Id</td>
        <td>First Name</td>
        <td>Last Name</td>

    </tr>

    @foreach ($ddc as $key=>$value)
        <tr>
            <td>{{ $value->maddc }}</td>
            <td>{{ $value->ddc }}</td>
            <td>{{ $value->tenddc }}</td>
        </tr>
    @endforeach

</table>
</body>
</html>
