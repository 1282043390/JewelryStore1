<?php
    header("content-type:text/html;charset=utf-8");
?>
<table  bgcolor="#ffebcd"  width="650" height="150">
    <tr>
        <td>
            {{$v->E_email}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        <td align="left">{{$v->c_level}}星</td>
    </tr>
    <tr>
        <td></td>
        <td align="right">{{$v->created_at}}</td>
    </tr>
</table>