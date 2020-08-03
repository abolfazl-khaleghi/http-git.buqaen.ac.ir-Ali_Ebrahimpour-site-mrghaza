<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Page;
use App\Models\Restaurant;
use App\Models\Servant;
use App\User;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use nusoap_client;
use PhpParser\Node\Scalar\String_;
use function PHPSTORM_META\type;
use function test\Mockery\Fixtures\HHVMString;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function staticPages()
    {
        $url = request()->getRequestUri();

        $url = str_replace('/', '', $url);
        $contents = DB::table('pages')->where('link', '=', $url)->get('description');
        if ($contents->isEmpty()) return abort(404);
        return view('staticPage', compact('contents'));
    }


    public function index()
    {
        $restaurants = Restaurant::where('enabled', '=', '1')->get();
        return view('home', compact('restaurants'));
    }

    public function sendSms(Request $request)
    {
        $phone = str_replace(' ', '', $request->mobile);
        User::updateOrCreate(
            [
                'mobile' => $phone,
            ]
        );
        $url = "https://negar.armaghan.net/sms/url_type_message_send.html?username=989126079407&password=16JKy_:h&parameters=0&destination={$phone}&type=1605_001";
        $client = new \GuzzleHttp\Client([
            'verify' => false
        ]);
        $response = $client->request("GET", $url);
        return redirect()->back();

//        $phone = str_replace(' ', '', $request->mobile);
//        $message = "خوشمزه زندگی کن با اپلیکیشن مسترغذا \n
//\nازطریق لینک زیردانلود نمایید:
//http://cafebazaar.ir/app/?id=com.kipopay.mrghaza&ref=share";
//        $url = "http://www.sornasms.net/getCustomer.aspx?mobile={$phone}&message={$message}&senderNumber=500042922 &username=42922&pass=42922&code=9761";
//        $url = "http://www.sornasms.net/webpublish2/sornaservice.asmx?wsdl";
//        $client = new nusoap_client($url, true);
//
//        $rsult = $client->call("SingleSMSEngine", array(
//            'PortalCode' => 9761,
//            'UserName' => 42922,
//            'PassWord' => 42922,
//            'Mobile' => $phone,
//            'Message' => ""
//        ));
//        print_r($rsult["SingleSMSEngineResult"]);
    }


    public function registerRestaurant()
    {
//        $restaurants = Restaurant::where('enabled','=','1')->get();
        return view('registerRestaurant');
    }

    public function registerForm()
    {
        return view('registerForm');
    }

    public function setRegisterForm(Request $request)
    {
        $this->validate($request, [
            //user
            'userName' => 'required',
            'mobile' => 'max:11|min:11|unique:users',
            'phone' => 'max:11|min:11|unique:users',
            'sex' => 'required',
            'address' => 'required',

            //servant
            'shaba' => 'max:25',
            'codeMelli' => 'unique:servants|min:10|max:10',
            'city_id' => 'required',
            'province_id' => 'required',

            // restaurant
            'restaurantName' => 'required',
            'typeOwner' => 'required',
            'hesabdari' => 'required',
            'shopServant' => 'required',
            'shopService' => 'required',

        ]);

        $user = User::create([
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
            'user_id' => $user->id,
            'shaba' => $request->shaba,
            'codeMelli' => $request->codeMelli,
            'cardNumber' => $request->cardNumber,
            'city_id' => $request->city_id,
            'province_id' => $request->province_id,
        ]);
        $restaurant = Restaurant::create([
            'name' => $request->restaurantName,
            'typeOwner' => $request->typeOwner,
            'meter' => $request->meter,
            'hesabdari' => $request->hesabdari,
            'shopServant' => implode(',', $request->shopServant),
            'shopService' => implode(',', $request->shopService),
            'address' => $request->address,
            'phone' => $request->phone,
            'guild_id' => $request->guild_id,
            'city_id' => $request->city_id,
            'province_id' => $request->province_id,
            'servant_id' => $user->id,
            'slug' => $request->restaurantName,
        ]);
        $offer = Offer::create([
            'percent' => $request->percent,
        ]);
        alert()->success('اطلاعات با موفقیت ثبت شد', ' ثبت اطلاعات')->autoclose(3500)->persistent('بستن');
        return redirect()->back();
    }
}





