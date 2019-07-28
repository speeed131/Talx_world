<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Auth;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $login_id = Auth::id();
        $users = User::whereNotIn('id', [$login_id])->paginate(8);

        //whereNotInで配列を渡す！

        return view('users.index',[
            'users' => $users,
            ]);                         //resourceのviewsのusersフォルダのindex.blade.phpに'users'の値を$usersという変数で渡すという意味
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create',[
            ]);

        // $user->image_url = $request->image_url->storeAs('public/user_images', $time.'_'.Auth::user()->id . '.jpg');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $user = New User;
        $input = $request->only($user->getFillable());
        $user = $user->create($input);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $login_id = Auth::id();
        $followingeachother = DB::table('followables')
        ->where('user_id', $login_id)
        ->where('followable_id', $user->id)
        ->first();



        return view('users.show',[
            'user' => $user,
            'followingeachother' => $followingeachother,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        if($user->id == auth()->user()->id){
            return view('users.edit', ['user' => $user]);
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $originalImg = $request->user_image;

        $user->fill($request->all()); //fill関数に入れてる
        $user->save(); //データベースに保存
        $image = base64_encode(file_get_contents($roriginalImg->getRealPath()));
      
        

        if(!empty($originalImg)) {
          $filePath = $originalImg->store('public');
          $user->user_image = str_replace('public/', '', $filePath);
          $user->user_image = base64_encode(file_get_contents($roriginalImg->getRealPath()));
          $user->save();
        }
        else{
            return redirect("/users/{$user->id}")->with('user', $user);
        }
        return redirect("/users/{$user->id}")->with('user', $user);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = User::find($user->id);
        $user->delete();
        return redirect("/");
    }

    public function search(Request $request, User $user){

        $users = User::whereNotIn('id', [auth()->user()->id])
                ->where('name', 'like', "%{$request->search}%")
                ->orwhere('user_nationality', 'like', "%{$request->search}%")
                ->orwhere('user_learning_language', 'like', "%{$request->search}%")
                ->orwhere('user_topic', 'like', "%{$request->search}%")
                ->orwhere('user_introduce', 'like', "%{$request->search}%")

                ->paginate(8);    //paginateはユーザーの表示数

        $search_result = $request->search.'の検索結果';



        return view('users.index',[
            'users' => $users,
            'search_result' => $search_result,
            'request' => $request
                ]);

    }

    public function confirm(User $user){
        $id = auth()->user()->id;
        $user = User::find($id);
        $user->delete();
        return view('users.confirm',[
            'user' => $user

        ]);
    }

    public function follow(User $user){


        $login_user =Auth::user();
        $login_user->follow($user);


        $login_id = Auth::id();
        $followingeachother = DB::table('followables')
        ->where('user_id', $login_id)
        ->where('followable_id', $user->id)
        ->first();

        if(!empty($followingeachother)){
            return view('users.show',[
                'user' => $user,
                'followingeachother' => $followingeachother,
                ]);
        }


        return view('users.show',[
            'user' => $user

        ]);
    }
    public function unfollow(User $user){
        //unfollowボタンを押したら、フォローボタンを表示させたい。つまり、データを渡さない。


        $login_user =Auth::user();
        $login_user->unfollow($user);

        return view('users.show',[
            'user' => $user

        ]);
    }


    public function following(User $user){
        $following_users = $user->followings()->get();

        $be_followed_users = $user->followers()->get();

        $follow_users_number = count($following_users);
        
        $be_followed_users_number = count($be_followed_users);

        return view('users.following',[
            'following_users' => $following_users,
            'be_followed_users' => $be_followed_users,
            'follow_users_number' => $follow_users_number,
            'be_followed_users_number' => $be_followed_users_number,
        ]);
    }
}