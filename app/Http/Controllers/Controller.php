<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
         
         // ユーザの投稿一覧を作成日時の降順で取得
         $micropost = $user->microposts()->orderBy("created_at","desc")->paginate(10);
         
         // ユーザ詳細ビューでそれらを表示
         return view("users.show",[
             "user" => $user,
             "microposts" => $microposts,
        ]);
          
        
    }
}
