
<table border="1">
<tr><th colspan=3><center>Patients to be Refilled in 2 days</center></th></tr>

<tr>
    <th>UID</th>
    <th>Arv_Type</th>
    <th>Next Refill Date</th>
    </tr>
@foreach ($lists as $list)
<tr>
    <th>{{$list['uid']}}</th>
    <th>{{$list['arv_type']}}</th>
    <th>{{$list['nextrefilldate']}}</th>
</tr>
@endforeach

</table>

