<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Moto;
use Illuminate\Http\Request;

class MotoAdminController extends Controller
{

    public function destroy(Moto $moto) // Método para eliminar una moto
    {
        $moto->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Moto eliminada');
    }
}