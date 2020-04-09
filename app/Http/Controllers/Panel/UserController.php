<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use UxWeb\SweetAlert\SweetAlert;

class UserController extends Controller
{
    /**
     * accept comment in panel by admin
     **/
    public function accept($id)
    {
        $comment = User::where('id', $id)->first();
        $comment->update(['enabled' => 1]);
        return redirect()->back();

    }

    /**
     * reject comment in panel by admin
     **/
    public function unAccept($id)
    {
        $comment = User::where('id', $id)->first();
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
        $users = DB::table('users')->where('role', 'user')
            ->orderBy('created_at','desc')->paginate(10);
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
        $this->validate($request, [
            'mobile' => 'max:11|min:11|unique:users',
//            'phone' => 'unique:users|min:11|max:11',
//            'shaba' => 'unique:servants| max:25',
            'codeMelli' => 'unique:servants|min:10|max:10',
        ]);

        $user = User::where('mobile', '=', $request->mobile);
        if ($user->count() < 1) {
            $member = User::create([
                'name' => $request->userName,
                'role' => 'user',
                'enabled' => 0,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'sex' => $request->sex,
                'address' => $request->address,
//                'password' => Hash::make('123456'),
            ]);
            Member::create([
                'user_id' => $member->id,
                'birthday' => $request->birthday,
                'fatherName' => $request->fatherName,
                'city_id' => $request->city_id,
            ]);

            alert()->success('اطلاعات با موفقیت ثبت شد', ' ثبت اطلاعات')->autoclose(3500)->persistent('بستن');
            return redirect(route('user.index'));
        }
        alert()->error('اطلاعات را دوباره بررسی کنید', 'خطا در ثبت')->autoclose(3500)->persistent('بستن');
        return redirect()->back();
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
        $user = User::with('member')->where('id', $id)->first();
        return view('panel.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'mobile' => 'max:11|min:11',
//            'phone' => 'min:11|max:11',
//            'shaba' => 'max:25',
            'codeMelli' => 'min:10|max:10',
        ]);
        $member = User::updateOrCreate([
            'name' => $request->userName,
            'role' => $request->role,
            'enabled' => $request->enabled,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'sex' => $request->sex,
            'address' => $request->address,
//            'password' => Hash::make($request->password),
        ]);
        Member::updateOrCreate([
            'user_id' => $member->id,
            'birthday' => $request->birthday,
            'fatherName' => $request->fatherName,
            'city_id' => $request->city_id,

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
