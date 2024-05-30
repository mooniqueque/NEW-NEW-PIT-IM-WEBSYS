<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\AdmissionHandler;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admission_handlers',
            'password' => 'required|string|min:8',
        ]);

        $admissionHandler = new AdmissionHandler();
        $admissionHandler->name = $request->name;
        $admissionHandler->email = $request->email;
        $admissionHandler->password = Hash::make($request->password);
        $admissionHandler->save();

        return response()->json(['message' => 'Registration successful'], 201);
    }
}
