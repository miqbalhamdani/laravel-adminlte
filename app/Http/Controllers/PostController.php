<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();

        $datas = [
            'collection' => $post,
        ];

        return view('dashboard.pages.post.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $error_message  = false;

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'title'         => 'bail|required',
                'description'   => 'bail|required',
                'image'         => 'bail|mimes:jpeg,jpg,png|max:1000',
            ]);

            if ($validator->fails()) {
                $error_message = $validator->errors()->all()[0];
            } else {
                if ($request->hasFile('image')){
                    $img_path   = public_path(env('PATH_POST'));
                    $name       = date_time();

                    \File::exists($img_path) or \File::makeDirectory($img_path);

                    $img_name = $name.'.'.$request->file('image')->getClientOriginalExtension();
                    $request->file('image')->move($img_path, $img_name);
                }

                $post = new Post;
                $post->title        = $request->get('title');
                $post->description  = $request->get('description');
                $post->image        = $img_name;
                $post->save();

                return redirect('/admin/post')->with('success_message', 'Post successfully added.');
            }
        }

        $data = [
            'error_message' => $error_message,
            'input'         => $request->input()
        ];

        return view('dashboard.pages.post.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $error_message  = false;
        $post           = Post::find($id);

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'title'         => 'bail|required',
                'description'   => 'bail|required',
                'image'         => 'bail|mimes:jpeg,jpg,png|max:1000',
            ]);

            if ($validator->fails()) {
                $error_message = $validator->errors()->all()[0];
            } else {
                if ($request->hasFile('image')){
                    $img_path   = public_path(env('PATH_POST'));
                    $name       = date_time();
                    $img_old    = $post->image;

                    \File::exists($img_path) or \File::makeDirectory($img_path);

                    if(!empty($img_old)){
                        if(\File::isFile($img_path.$img_old)){
                            \File::delete($img_path.$img_old);
                        }
                    }

                    $img_name = $name.'.'.$request->file('image')->getClientOriginalExtension();
                    $request->file('image')->move($img_path, $img_name);

                    $post->image    = $img_name;
                }

                $post->title        = $request->get('title');
                $post->description  = $request->get('description');
                $post->save();

                return redirect('/admin/post')->with('success_message', 'Post successfully updated.');
            }
        }

        $data = [
            'form'          => $post,
            'error_message' => $error_message,
            'input'         => $request->input()
        ];

        return view('dashboard.pages.post.update', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post       = Post::find($id);
        $img_path   = public_path(env('PATH_POST'));
        $img_old    = $post->image;

        if(!empty($img_old)){
            if(\File::isFile($img_path.$img_old)){
                \File::delete($img_path.$img_old);
            }
        }

        $post->delete();

        return \Response::json();
    }
}
