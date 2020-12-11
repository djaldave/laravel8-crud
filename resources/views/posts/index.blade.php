@extends("layouts.app")

@section("title",'HomePage')

@section("content")
<div class="row">
    <div class="mx-auto col-lg-10">
        <a href="{{route("index.create")}}" class="btn btn-outline-warning btn-secondary">Create a Post</a>
        @if(session()->get("success"))
            <div class="alert alert-success mt-3">
                {{session()->get("success")}}
            </div>
        @endif
        <table class="table-responsive-md table table-striped text-warning table-dark mt-2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th class="">Description</th>
                    <th>Price</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($index as $post)
                    <tr>
                        <td class="w-auto">{{$post->id}}</td>
                        <td class="w-auto">{{$post->title}}</td>
                        <td class="w-auto ">{{$post->description}}</td>
                        <td class="w-auto">{{$post->price}}</td>
                        <td class="w-auto"><a href="{{route("index.show", $post)}}" class="btn btn-sm btn-outline-success  w-100"><i class="fa fa-eye"></i></a></td>
                        <td class="w-auto"><a href="{{route("index.edit", $post)}}" class="btn btn-outline-secondary btn-sm w-100"><i class="fa fa-pencil"></i></a></td>
                        <td class="w-auto">
                            <form method="post" action="{{ route('index.destroy', $post) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm w-100"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
