<?php
    namespace App\Http\Controllers\DataServices;
    use App\Models\User;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Auth;

    class UserDataService{

        public function updateUserData($name, $email, $phone){
            // dd('This is calling from Dataservice');
            // dd($name);

            $updateQuery = User::findOrFail(Auth::id())->update([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'updated_at' => Carbon::now(),
            ]);
            // dd('This is from method');
            return true;
        }





    }
