@extends('layouts.main')
@extends('layouts.table')

@section('table')

<h1>Show Table (Beispiel Tabelle)</h1>
<br>
<table>
  <tr>
    <th> Jahrgang </th>
    <th> Weinsorte </th>
    <th> l </th>
    <th> Preis € </th>
  </tr>
  <tr class="ungerade" >
    <td> 2008 </td>
    <td> Riesling trocken </td>
    <td> 1,0 </td>
    <td> 3,50 </td>
  </tr>
  <tr class="gerade" >
    <td> 2007 </td>
    <td> Grauburgunder Kabinett trocken </td>
    <td> 0,75 </td>
    <td> 4,20 </td>
  </tr>
  <tr class="ungerade" >
    <td> 2008 </td>
    <td> Dornfelder lieblich </td>
    <td> 0,75 </td>
    <td> 4,60 </td>
  </tr>
  <tr class="gerade" >
    <td> 2009 </td>
    <td> Portugieser Weißherbst halbtrocken </td>
    <td> 1,0 </td>
    <td> 3,10 </td>
  </tr>
</table>

@stop