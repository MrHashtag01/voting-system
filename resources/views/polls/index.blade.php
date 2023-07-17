    <div class="mt-4 mb-4 d-flex align-items-center justify-content-between">
        <h5 class="m-0">Polls</h5>
        <a href="{{ route('polls.create') }}" class="btn btn-primary">New Poll +</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Votes</th>
                    <th>Updated At</th>
                    <th>Created At</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($polls as $poll) 
                    <tr>
                        <td>{{ $poll->id }}</td>
                        <td>{{ $poll->title }}</td>
                        <td>{{ $poll->slug }}</td>
                        <td>{{ $poll->votes }}</td>
                        <td>{{ $poll->updated_at }}</td>
                        <td>{{ $poll->created_at }}</td>
                        <td class="text-center">
                            <a href="{{ route('polls.show', $poll->slug) }}" class="btn btn-success btn-sm">View</a>
                            <a href="{{ route('polls.edit', $poll->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('polls.destroy', $poll->id) }}" method="post" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm " type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



