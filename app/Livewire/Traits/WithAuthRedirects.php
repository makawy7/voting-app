<?php

namespace App\Livewire\Traits;

trait WithAuthRedirects
{
    public function redirectToLogin()
    {   
        redirect()->setIntendedUrl(url()->previous());
        return $this->redirectRoute('login', navigate: true);
    }
}
