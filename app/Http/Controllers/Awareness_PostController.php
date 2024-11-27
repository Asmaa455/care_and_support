<?php

namespace App\Http\Controllers;
use App\Models\Awareness_Post;

use Illuminate\Http\Request;

class Awareness_PostController extends Controller
{
    public function post()
    {
        // الحصول على المناشير
        $post=Awareness_Post::get();
        return response()->json($post);
    }

    public function Doctor_s_post($id)
    {
        // الحصول على المناشير الخاصة بطبيب معين
        $post=Awareness_Post::where('doctor_id',$id)->get();
        return response()->json($post);
    }
    public function deleted_post($id)
    {
        //الحصول على المناشير المحذوفة الخاصة بطبيب معين
        $post=Awareness_Post::where('doctor_id',$id)->onlyTrashed()->get();
        return response()->json($post);
    }

    public function store_post(Request $request,$id)
    {
        // تخزين منشور
        $post = Awareness_Post::create([
            'doctor_id' => $id,
            'category' => $request->category,
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return response()->json([
            'message' => 'post created successfully',
            'post' => $post
        ]);
    }

    public function edit_post(Request $request,$id)
    {
        //تعديل إجابة
        $post = Awareness_Post::findOrFail($id);
        $post->update([
            'category' => $request->category,
            'title' => $request->title,
            'content' => $request->content,
            ]);
            return response()->json([
                'message' => 'post edit successfully',
                'post' => $post,
            ]);
        
    }


    public function destroy($id)
    {
        //حذف غير كامل
    Awareness_Post::destroy($id);
    return response()->json([
        'message' => 'post deleted successfully',
    ]);   
    }

    public function restore($id){
        //إعادة البوست بعد حذفه
        Awareness_Post::withTrashed()->where('id',$id)->restore();
        return response()->json([
            'message' => 'post restored successfully',
        ]);
    }

    public function forcedelete($id){
        Awareness_Post::withTrashed()->where('id',$id)->forceDelete();
        return response()->json([
            'message' => 'Completely deleted',
        ]);    
    }


}
