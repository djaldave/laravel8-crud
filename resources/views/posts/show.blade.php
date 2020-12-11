@extends("layouts.app")
@section("title", "Create")
@section("content")
    <div class="row">
        <div class="mx-auto col-lg-10">
            <a href="{{route("index.index")}}" class="btn btn-outline-warning btn-secondary">&laquo; Back to Menu</a>
            <h2 class="text-center text-warning m-3">View Details</h2>
            <form readonly autocomplete="off" class="text-warning">
                @csrf
                <div class="">
                    <div class="form-group">
                        <label for="post-title">Name</label>
                        <input type="text" name="title"
                               value="{{$post->title}}" readonly disabled class="form-control bg-dark text-center text-white font-weight-bold" id="post-title"  style="font-size: 1.15rem">
                    </div>
                    <div class="form-group">
                        <label for="post-description">Description</label>
                        <textarea name="description" class="form-control bg-dark text-center text-white font-weight-bold" readonly disabled id="post-description" rows="2"  style="font-size: 1.15rem">{{$post->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="post-price">Price</label>
                        <input type="text" name="price" readonly disabled
                               value="{{$post->price}}" class="form-control bg-dark text-white text-center font-weight-bold" id="post-price"  style="font-size: 1.15rem">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
