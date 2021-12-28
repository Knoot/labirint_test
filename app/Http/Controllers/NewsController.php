<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function show(Request $request)
    {
        $news = new News();

        if ($str = $request->input('q')) {
            $news->findByTitle($str);
        }

        if ($id = (int) $request->input('id')) {
            $news->findById($id);
        }

        return view('NewsTemplate', ['news' => $news]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'description' => 'max:255',
            'body' => 'required',
            'tags' => '',
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors(),
            ];
        }

        $news = new News();

        $news->setTitle($request->input('title'));
        $news->setDescription($request->input('description'));
        $news->setBody($request->input('body'));
        $news->setTags($request->input('tags'));

        return ['success' => true];
    }

    public function delete(Request $request)
    {
        return ['success' => (new News($request->input('id')))->delete()];
    }
}
