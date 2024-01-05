<?php

namespace App\Services;

use App\Exports\UsersExport;

/**
 * Class ExcelService.
 */
class ExcelService
{

    public function exportUsersExcel()
    {
        $usersExport = new UsersExport();
        $exportFile = $usersExport->store('users.xlsx', 'public');

        return $exportFile;
    }

}
