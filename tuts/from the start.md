laravel new laravel8-crud

#### inside the folder
`composer require laravel/ui`

#### to add assets bootstrap
* `php artisan ui bootstrap`
* `npm install && npm run dev`


### edit the .env
* comment  `#DB_HOST=mysql`
* uncomment `DB_HOST=127.0.0.1`

### create database name
`laravel8_crud`

### to clear and cache config
`php artisan config:cache`

### model
php artisan make:model Post -m

### add this code in `app/Models/Post.php`
<pre>
 protected $fillable =[
        'title','description','price'
    ];
	
</pre>

#### edit the function and add this code in `database/migrations/2020_12_11_030104_create_posts_table.php`
 <pre>
 public function up()
     {
         Schema::create('posts', function (Blueprint $table) {
             $table->id();
             $table->string("title");
             $table->string("description");
             $table->double("price");
             $table->timestamps();
         });
     }
 </pre>

#migration 
`php artisan migrate:fresh`


#controller
`php artisan make:controller CrudController`


### in resources/views create folder `layout` and `post`
* #### create file under the folder layout
* `app.blade.php`
  * add this code 
  

* ### create file under the folder `posts`
* `create.blade.php`
  * add this `code`
 
* `edit.blade.php`
   * add this `code` 

* `index.blade.php`
  * add this `code`

* `show.blade.php`
  * add this `code`



### in `app/Http/Controllers/CrudController.php`
<pre>
`<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    //
    public function index(){
        $index  = Post::all();
        return view("posts.index", compact("index"));
    }

    public function create(){
        return view("posts.create");
    }

    public function store(Request $request){
        $request->validate([
            'title'=> 'required|max:255',
            'description'=> 'required|max:255',
            'price'=> 'required|max:255'
        ]);
        $post = new Post([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
        ]);
        $post->save();
        return redirect('/index')->with('success', 'Post added successfully!');
    }

    public function show($id){
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id){
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'title'=> 'required|max:255',
            'description'=> 'required|max:255',
            'price'=> 'required|max:255'
        ]);
        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->price = $request->get('price');
        $post->save();
        return redirect('/index')->with('success', 'Post edited successfully!');
    }
    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('/index')->with('success', 'Post deleted!');
    }
}
`
</pre>
#### add this `app/Models/Post.php`
<pre>


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 */
class Post extends Model
{
    use HasFactory;
    protected $fillable =[
        'title','description','price'
    ];
}
</pre>
### add routes in `routes/web.php`
<pre>
`Route::resource("index", "App\Http\Controllers\CrudController");
Route::resource("/", "App\Http\Controllers\CrudController");`
</pre>
