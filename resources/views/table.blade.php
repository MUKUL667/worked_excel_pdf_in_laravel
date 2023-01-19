<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">

                            <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th> Sno </th>
                                        <th> Top Banner Image </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($data))
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach($data as $result)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td><img width=100px
                                                        src='{{ asset('images/' . $result->original_image) }}'>
                                                    </img></td>


                                                <td>
                                                    <div class="d-flex justify-content">
                                                        <div style="margin-right: 7px">
                                                            <a href="{{ url('/deletetest/'.$result->id) }}"
                                                                class="btn btn-primary ">delte</a>
                                                        </div>
                                                    </div>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                </td>
                                            </tr>

                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
