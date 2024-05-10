@extends('backend.components.master')
@section('master')
<div class="card">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Show Section</h1>
                @include('components.message')
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S.N</th>
                             <th>Section Name</th>
                              <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sectionData as $key=>$section)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$user->name}}</td>
                            <td>
                                <a href="{{route('manage-section.edit',$section->id)}}" class="btn btn-primary">Edit</a>
                                <form action="{{route('manage-section.destroy',$section->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="retrun confirm('Are you sure')">Delete</button>

                                </form>

                            </td>

                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
