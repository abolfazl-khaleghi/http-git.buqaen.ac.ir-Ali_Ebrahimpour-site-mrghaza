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
        $servants = Servant::paginate(5);
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
     */
    public function store(Request $request)
    {
        $user = User::where('mobile', '=', $request->mobile); //todo if both role
        if ($user->count() < 1) {

            $this->validate($request, [
                'mobile' => 'required |unique:users| max:11 | min:11'
            ]);

            $servant = User::updateOrCreate([
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
            $servant = Servant::updateOrCreate([
                'user_id' => $servant->id,
                'shaba' => $request->shaba,
                'codeMelli' => $request->codeMelli,
                'cardNumber' => $request->cardNumber,
                'city_id' => $request->city,

            ]);
            return redirect(route('servant.index'));

        }
        return redirect()->back();  //todo fail it with sweet alert
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servant $servant)
    {
        $user = \App\User::where('id', $servant->user_id)->first();
        $user->update($request->all());
        $servant->update($request->all());

        //        $servant = User::updated([
//            'name' => $request->userName,
//            'role' => "servant",
//            'enabled' => 0,
//            'email' => $request->email,
//            'mobile' => $request->mobile,
//            'sex' => $request->sex,
//            'address' => $request->address,
//            'password' => Hash::make('123456'),
//        ]);
//        $servant = Servant::updated([
////            'user_id' => $servant->id,
//            'shaba' => $request->shaba,
//            'codeMelli' => $request->codeMelli,
//            'cardNumber' => $request->cardNumber,
//            'city_id' => $request->city,
//
//        ]);
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
