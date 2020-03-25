<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
    accept comment in panel by admin
     **/
    public function accept($id){
        $comment = User::where('id',$id)->first();
        $comment->update(['enabled' => 1]);
        return redirect()->back();

    }
    /**
    reject comment in panel by admin
     **/
    public function unAccept($id){
        $comment = User::where('id',$id)->first();
        $comment->update(['enabled' => 0]);
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role','user')->get();
        return view('panel.users.all', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('mobile', '=', $request->mobile);
        if ($user->count() < 1) {
            $member = User::updateOrCreate([
                'name' => $request->userName,
                'role' => 'user',
                'enabled' => 0,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'sex' => $request->sex,
                'address' => $request->address,
                'password' => Hash::make('123456'),
            ]);
            $member = Member::updateOrCreate([
                'user_id' => $member->id,
                'birthday' => $request->birthday,
                'cardNumber' => $request->cardNumber,
            ]);

            return $request->userName;
        }
        return redirect()->back();  //todo fail it with sweet alert
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('member')->where('id',$id)->first();
        return view('panel.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user )
    {
        $member = User::updateOrCreate([
            'name' => $request->userName,
            'role' => $request->role,
            'enabled' => $request->enabled,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'sex' => $request->sex,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);
        $member = Member::updateOrCreate([
            'user_id' => $member->id,
            'birthday' => $request->birthday,
            'cardNumber' => $request->cardNumber,
        ]);
        return redirect()->back();  //todo fail it with sweet alert
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Member::whereUser_id($user->id)->delete();
        $user->delete();
        return redirect()->back();  //todo fail it with sweet alert
    }
}
