@extends("layouts.app")
@section("title", "Edit")
@section("content")
    <div class="row">
        <div class="mx-auto col-lg-10">
            <a href="{{route("index.index")}}" class="btn btn-outline-warning btn-secondary">&laquo; Back to Menu</a>
            <h2 class="text-center text-warning m-3">Update Details</h2>
            @if($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('index.update', $post) }}" autocomplete="off" class="text-warning">
                @csrf
                @method("PATCH")
                <div class="modal-body">
                    <div class="form-group">
                        <label for="post-title">Name</label>
                        <input type="text" name="title"
                               value="{{$post->title }}" class="form-control  text-center" id="post-title" style="font-size: 1.15rem">
                    </div>
                    <div class="form-group">
                        <label for="post-description">Description</label>
                        <textarea name="description" class="form-control  text-center " id="post-description" rows="3"  style="font-size: 1.15rem">{{ $post->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="post-price">Price</label>
                        <input type="text" name="price"
                               value="{{ $post->price }}" class="form-control text-center" id="post-price" style="font-size: 1.15rem"   >
                    </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success w-50" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
