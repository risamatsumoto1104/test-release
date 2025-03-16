<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function create(Request $request)
    {
        return view('create');
    }

    public function store(CreateRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        Address::create([
            'user_id' => $user->user_id,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'building' => $request->building,
        ]);

        return redirect()->route('list.show');
    }

    public function show(Request $request)
    {
        // ユーザーと関連する住所情報を取得
        $users = User::with('address')->get();

        return view('show', compact('users'));
    }

    public function getDetails($user_id)
    {
        $user = User::with('address')->findOrFail($user_id);

        return response()->json([
            'user_id'       => $user->user_id,
            'name'     => $user->name,
            'email'    => $user->email,
            'postal_code'  => optional($user->address)->postal_code,
            'address'  => optional($user->address)->address,
            'building' => optional($user->address)->building,
        ]);
    }

    public function destroy($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();

        return redirect()->route('list.show');
    }
}
