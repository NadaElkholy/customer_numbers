<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Country</th>
      <th class="th-sm">State</th>
      <th class="th-sm">Code</th>
      <th class="th-sm">Phone Num.</th>
    </tr>
  </thead>
  <tbody>
    @if(empty($customers_phones))
    <tr>
      <td>--</td>
      <td>--</td>
      <td>--</td>
      <td>--</td>
    </tr>
    @else
      @foreach($customers_phones as $phone)
        <tr>
          <td>{{$phone->country}}</td>
          <td>{{$phone->state}}</td>
          <td>{{$phone->code}}</td>
          <td>{{$phone->phone_num}}</td>
        </tr>
      @endforeach
    @endif
  </tbody>
  <tfoot>
    <tr>
      <th>Country</th>
      <th>State</th>
      <th>Code</th>
      <th>Phone Num.</th>
    </tr>
  </tfoot>
</table>