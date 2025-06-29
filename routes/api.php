<?php

use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;

route::apiResource('/kelas', KelasController::class);

