<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Actions\Logout;

class NavTop extends Component
{
    public function logout(Logout $logout)
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.nav-top', [
            'user' => auth()->user(),
        ]);
    }
}
