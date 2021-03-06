<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Servant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ServantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servants = Servant::orderBy('created_at', 'desc')->paginate(10);
        return view('panel.servant.all', compact('servants'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.servant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $user = User::where('mobile', '=', $request->mobile); //todo if both role
        if ($user->count() < 1) {

            $this->validate($request, [
                'mobile' => 'max:11|min:11|unique:users',
                'phone' => 'min:11|max:11|nullable',
                'shaba' => 'unique:servants| min:24 | max:24|nullable',
                'codeMelli' => 'unique:servants|min:10|max:10',
            ]);

            $servant = User::create([
                'name' => $request->userName,
                'role' => "servant",
                'enabled' => 0,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'phone' => $request->phone,
                'sex' => $request->sex,
                'address' => $request->address,
                'password' => Hash::make('123456'),
            ]);
            $servant = Servant::create([
                'user_id' => $servant->id,
                'shaba' => $request->shaba,
                'codeMelli' => $request->codeMelli,
                'cardNumber' => $request->cardNumber,
                'city_id' => $request->city_id,

            ]);
            alert()->success('اطلاعات با موفقیت ثبت شد', ' ثبت اطلاعات')->autoclose(3500)->persistent('بستن');
            return redirect(route('servant.index'));

        }
        alert()->error('اطلاعات را دوباره بررسی کنید', 'خطا در ثبت')->autoclose(3500)->persistent('بستن');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return void
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
    public function edit(Servant $servant)
    {
        return view('panel.servant.edit', compact('servant'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Servant $servant
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Servant $servant)
    {
//        return $request;
        $this->validate($request, [
            'mobile' => 'max:11 | min:11',
            'phone' => 'min:11 | max:11 |nullable',
            'shaba' => ' min:24 | max:24|nullable',
            'codeMelli' => 'min:10 | max:10',
        ]);

        $user = \App\User::where('id', $servant->user_id)->first();
        $user->update([
            'name' => $request->userName,
            'role' => "servant",
            'enabled' => 0, //todo
            'email' => $request->email,
            'mobile' => $request->mobile,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'address' => $request->address,
            'password' => Hash::make('123456'),
        ]);
        $servant->update([
            'user_id' => $servant->id,
            'shaba' => $request->shaba,
            'codeMelli' => $request->codeMelli,
            'cardNumber' => $request->cardNumber,
            'city_id' => $request->city_id,

        ]);

        return redirect(route('servant.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Servant $servant
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Servant $servant)
    {
        User::whereId($servant->user_id)->delete();
        $servant->delete();
        return redirect()->back();
    }
}
