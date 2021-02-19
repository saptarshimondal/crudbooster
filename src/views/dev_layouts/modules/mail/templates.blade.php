@extends("crudbooster::dev_layouts.layout")
@section("content")

    <!-- Your Page Content Here -->
    <p>
        <a href="{{ cb()->getDeveloperUrl("mail/add-template") }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add New Template
        </a>
    </p>

    <div class="box box-default">
        <div class="box-header">
            <h1 class="box-title">Show Data</h1>
        </div>
        <div class="box-body">
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($templates as $template)
                        <tr>
                            <td>{{ $template->name }}</td>
                            <td>{{ $template->slug }}</td>
                            <td>
                                <a href="{{ cb()->getDeveloperUrl("mail/edit-template/".$template->id) }}" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{ cb()->getDeveloperUrl("mail/delete-template/".$template->id) }}" class="btn btn-danger delete" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('bottom')
    <script>
        jQuery(document).ready(function($) {
            $('.delete').on('click', function(e){
                if(confirm("Are You Sure ?")){
                    window.location.href = $(this).attr('href')
                }
                else{
                    e.preventDefault()
                }
            })
        });
    </script>

@endpush