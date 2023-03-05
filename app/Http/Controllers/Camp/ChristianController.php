<?php

namespace App\Http\Controllers\Camp;

use App\Http\Controllers\Controller;
use App\Models\Christian;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ChristianController extends Controller
{
    public function create(Request $input)
    {
        $input = request()->all();
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'username' => ['nullable', 'string', 'max:255', 'unique:users'],
            'dob' => ['required'],
            'country' => ['nullable', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'assembly' => ['required_with:pastor', 'string', 'max:255','nullable'],
            'pastor' => ['required_with:assembly', 'string', 'max:255','nullable'],
            'invite' => ['nullable', 'string', 'max:255'],
            'need_accommodation' => ['required', 'string', 'max:255'],
          
        ])->validate();

         Christian::create([
            'name' => $input['name'],
            'gender' => $input['gender'],
            'contact' => $input['contact'],
            'username' => $input['username'],
            'dob' => $input['dob'],
            'country' => $input['country']??'Zimbabwe',
            'province' => $input['province'],
            'assembly' => $input['assembly'],
            'pastor' => $input['pastor'],
            'invite' => $input['invite'],
            'need_accommodation' => $input['need_accommodation'],          
        ]);

        return to_route('campRedirect');

    }

  
}
