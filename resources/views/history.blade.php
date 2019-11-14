@extends('layouts.app')
@section('content')

    <div class="container-fluid app-body">
        <div class="row">

            <div class="col-sm-4">
                <div class="form-group">
                    <form>
                        <input type="text" class="form-control" id="searchdata" name="search">
                    </form>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">

                </div>
            </div>


            <div class="col-sm-4 form-group">
              <select>
                  <option>Select group</option>
                  <option>Content Upload</option>
                  <option>Select Curation </option>
                  <option>RSS  </option>
              </select>
            </div>



            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Group Name</th>
                    <th scope="col">Group Type</th>
                    <th scope="col">Account Name</th>
                    <th scope="col">Post Text </th>
                    <th scope="col">Time</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paginates as $data)
                <tr>
                    <td>{{ $data->groupInfo->name }}</td>
                    <td>{{ $data->groupInfo->type }}</td>
                    <td>{{ $data->accountInfo->name }}</td>
                    <td>{{ $data->post_text}}</td>
                    <td>{{ $data->sent_at}}</td>
                </tr>
                    @endforeach

                </tbody>
            </table>

            <span>{{ $paginates->links() }}</span>

        </div>
    </div>

    <script
            src="https://code.jquery.com/jquery-2.2.4.js"
            integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
            crossorigin="anonymous">

    </script>

    <script>
        $('#searchdata').on('keyup', function () {
            $search = $(this).val();
            $.ajax({
                method:'get',
                url: "{{ route('history.search') }}",
                data: { 'search' : $search },
                success:function (data) {
                    console.log(data);
                    $('tbody').html(data);
                },
                error:function (err) {
                    console.log(err);
                }
            })
        });
    </script>


    @endsection