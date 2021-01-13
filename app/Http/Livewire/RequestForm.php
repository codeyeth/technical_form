<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Http\Request;
use App\Models\TechRequests;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Events\TechSupportOnlineEvent;

class RequestForm extends Component
{
    public $description = "";
    public $descriptionCount = 0;
    
    public $empName = "";
    
    public function render()
    {
        return view('livewire.request-form');
    }
}
