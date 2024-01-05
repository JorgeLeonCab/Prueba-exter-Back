<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ExcelService;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    protected ExcelService $excel_service;

    public function __construct(ExcelService $excel_service)
    {
        $this->excel_service = $excel_service;
    }

    public function exportUsersExcel() {
        try {
            $exportFile = $this->excel_service->exportUsersExcel();
            return response()->json(['file' => $exportFile]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Ocurrio un error :c',
                'data' => $th->getMessage()
            ], 500);
        }
    }

}
