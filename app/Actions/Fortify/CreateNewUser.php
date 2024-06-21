<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
        // Validasi input
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Validasi email dengan menggunakan fungsi dnscheck PHP untuk memastikan email valid dan aktif
        $validated = validator(['email' => $input['email']], ['email' => 'email:rfc,dns']);

        if ($validated->fails()) {
            // Jika validasi email gagal, lakukan hal berikut:
        
            // Ambil pesan kesalahan dari validator
            $errors = $validated->errors();
        
            // Tampilkan pesan kesalahan yang sesuai, misalnya:
            // $errors->first('email') akan mengambil pesan kesalahan pertama untuk bidang email
            $errorMessage = $errors->first('email');
        
            // Redirect kembali ke halaman pendaftaran dengan pesan kesalahan
            return redirect()->back()->withInput()->withErrors(['email' => $errorMessage]);
        }        

        // Simpan pengguna
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
