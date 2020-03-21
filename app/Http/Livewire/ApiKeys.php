<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ApiKeys extends Component
{
    public $apiKeys;
    public $plainTextToken;

    public function mount()
    {
        $user = auth()->user();
        $this->apiKeys = $user->tokens;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.api-keys');
    }


    /**
     * generate a new api key
     */
    public function generateApiKey()
    {
        $user = auth()->user();
        $token = $user->createToken('buxale-api-key');
        $this->apiKeys->push($token->accessToken);
        $this->plainTextToken = $token->plainTextToken;
    }


    /**
     * delete all existing api keys
     */
    public function deleteApiKeys()
    {
        $user = auth()->user();
        $user->tokens()->delete();
        $this->plainTextToken = '';

        $this->apiKeys = $user->tokens;
    }
}
