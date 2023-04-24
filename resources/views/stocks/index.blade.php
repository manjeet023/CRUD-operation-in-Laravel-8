    @extends('stocks.layout')

    @section('content')

        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center">CRUD Application for Stock Management using Laravel</h2>
            </div>
            <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
                <a class="btn btn-primary " href="{{ route('stocks.create') }}"> Create Stock</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        @if(sizeof($stocks) > 0)
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Stock Name</th>
                    <th>Stock Description</th>
                    <th>Quantity</th>
                    <th width="280px">Operation</th>
                </tr>
                @foreach ($stocks as $stock)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $stock->product_name }}</td>
                        <td>{{ $stock->product_desc }}</td>
                        <td>{{ $stock->product_qty }}</td>
                        <td>
                            <form action="{{ route('stocks.destroy',$stock->id) }}" method="POST">
                                <a class="btn btn-secondary" href="{{ route('stocks.show',$stock->id) }}">Read</a>
                                <a class="btn btn-warning" href="{{ route('stocks.edit',$stock->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="alert alert-alert">Please Add to the Database.</div>
        @endif

        {!! $stocks->links() !!}

    @endsection