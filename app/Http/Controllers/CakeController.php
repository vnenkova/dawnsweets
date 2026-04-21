<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\User;
use App\Http\Requests\UpdateCakeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CakeController extends Controller
{
    
    public function edit(string $id) {
        $user = Auth::user();
        $cake = Cake::where('id', $id)->first();

        if (!$cake) {
            return redirect()->back()->with('error', 'No such cake found.');
        }

        return view('pages.edit-cake', compact('cake', 'user'));
    }

    public function update(UpdateCakeRequest $request, string $id) {
        $cake = Cake::where('id', $id)->first(); 

        if (!$cake) {
            return redirect()->back()->with('error', 'No such cake found.');
        }

        $input = $request->validated();

        $cake->update([
            'name'  => $input['name'],
            'price' => $input['price'],
            'grams' => $input['grams']
        ]);

        return redirect()->route('home')->with('success', 'Cake updated successfully.');

    }

    public function destroy(string $id) {
        $cake = Cake::where('id', $id)->first(); 

        if (!$cake) {
            return redirect()->back()->with('error', 'No such cake found.');
        }

        $cake->delete();

        return redirect()->route('home')->with('success', 'Cake deleted successfully.');
    }

}
