<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Repositories\Contracts\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Response;
use App\Http\Resources\UserCollection;
class TemplateController extends Controller
{
    protected $userRepository;
    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;

    }

    public function createUser(Request $request){
        try{
            // $result = $this->userRepository->getUser();
            $data = [
                'name' => 'user1',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('123456'),
                'email_verified_at' => Carbon::now(),
                'remember_token' => 'abc',
                'created_at' => Carbon::now(),
                'updated_at'=> Carbon::now(),
            ];
            $result = $this->userRepository->create($data);
            return Response::data( $result, 'Successfully', 200);
        }catch(Exception $e){
            return Response::dataError($e->getMessage(), 500);
        }
    }

    public function getList(){
        try{
            $result = $this->userRepository->all();
            return Response::data($result, 'Successfully', 200);
        }catch(Exception $e){
            return Response::dataError($e->getMessage(), 500);
        }
    }

    /*
     * getUserInfo
     * @param
     * @return Array()
     * */
    public function getUserInfo(){
        try{
//            $result = $this->userRepository->find(1);
            $result = $this->userRepository->getUser();
            dd($result);
            return Response::data($result, 'Successfully', 200);
        }catch(Exception $e){
            return Response::dataError($e->getMessage(), 500);
        }
    }
}
