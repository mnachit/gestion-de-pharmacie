<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Validator::make($input, [
        //     'first' => ['required', 'string', 'max:255'],
        //     'last' => ['required', 'string', 'max:255'],
        //     'phone' => ['required', 'string', 'max:255'],
        //     'email' => [
        //         'required',
        //         'string',
        //         'email',
        //         'max:255',
        //         Rule::unique(User::class),
        //     ],
        //     'password' => $this->passwordRules(),
        // ])->validate();

        return User::create([
            'First' => $input['first'],
            'Last' => $input['last'],
            'Num_tele' => $input['phone'],
            'username' => $input['first'][0].$input['last'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
