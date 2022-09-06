<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Http\Requests\Admin\User\UpdateRequest;
use Illuminate\Support\Facades\Hash;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $this->service->update($data, $user);        
        return redirect()->route('admin.user.index');
    }
}
