<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<main>
    <div class="container card card-body">
        <div class="card-header bg-warning">
            <h1 class="text-center">Service List</h1>
            <a href="{{ route('ser.create') }}" class="btn btn-primary text-left">Add New</a>
        </div>

        <table border="1" width="100%" class="table table-striped">
            <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Content</th>
                <th>Photo</th>
                <th style="width: 165px">Action</th>
            </tr>
            @forelse ($data as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->title }}</td>
                    <td>{{ $d->content }}</td>
                    
                    <td><img src="{{asset('images/'. $d->photo) }}" alt="photo" height="100" ></td>
                    <td style="margin:5px">
                        <div class="row">
                            <div class="btn btn-display flex">
                                <a href="{{ route('ser.show', $d->id) }}" class="btn btn-warning">Show</a>
                            </div><br>
                            <div class="btn btn-display flex">
                                <a href="{{ route('ser.edit', $d->id) }}"class="btn btn-success">update</a>
                            </div>

                            <div class="btn btn-display flex">
                                <form action="{{ route('ser.destroy', $d->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <th colspan="4">No Product found!</th>
                </tr>
            @endforelse
        </table>
    </div>
</main>