@extends('layouts.dashboard')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <form action="{{ url('dashboard')}}" method="get">
                    <div class="col-sm-6">
                        <div class="dataTables_length" ><label>Show <select name="limit"  onchange='this.form.submit()'aria-controls="example1" class="form-control input-sm">
                                    <?php
                                    $display_amount = isset($query["limit"]) ?$query["limit"] : 20;
                                    ?>
                                    @foreach ($ranges as  $value )
                                        <option value="{{$value}}" <?php if($display_amount == $value){ echo "selected"; } ?> >{{ $value }}</option>
                                    @endforeach
                                </select> entries</label>
                        </div>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <div class="form-group">
                            <label for="sel1">Search</label>
                            <select class="form-control" id="search_field" name="search_field">
                                <?php
                                $search_field = isset($query["search_field"]) ?$query["search_field"] : '';
                                $search_text = isset($query["search_text"]) ?$query["search_text"] : '';
                                ?>
                                @foreach ($filters as  $key => $node )
                                    <option value="{{$key}}" <?php if($search_field == $key){ echo "selected"; } ?> >{{ $node }}</option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control" id="search_text" name="search_text" value="{{ $search_text  }}">
                            <button class="btn btn-secondary" type="submit">Go!</button>
                        </div>
                    </div>
                  </form>
                </div>
                <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 283px;">ID</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 345px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 308px;">Thai ID</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 245px;">Gender</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  style="width: 181px;">Mobile</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($results as $value)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $value->getID() }}</td>
                                    <td>{{ $value->getName() }}</td>
                                    <td>{{ $value->getThaiID() }}</td>
                                    <td>{{ $value->getGender() }}</td>
                                    <td>{{ $value->getMobile() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table></div></div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries
                        </div>
                    </div>
                    <div class="col-sm-7">
                        {{ $results->appends(request()->query())->links() }}
                    </div>
                   </div></div>
        </div>
        <!-- /.box-body -->
    </div>
@endsection