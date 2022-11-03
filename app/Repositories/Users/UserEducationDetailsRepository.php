<?php
namespace App\Repositories\Users;

use App\Models\UserEducationDetail;
use Carbon\Carbon;

class UserEducationDetailsRepository {

    public function save($data)
    {

        $data['acquired_date'] = Carbon::parse($data['acquired_date']);

        $education_detail = new UserEducationDetail($data);
        
        $education_detail->save();

        return $education_detail;

    }

    public function update($id, $data)
    {
        $education_detail = UserEducationDetail::find($id);
        
        $data['acquired_date'] = Carbon::parse($data['acquired_date']);
        
        $education_detail->update($data);

        return $education_detail;
    }

    public function delete($id)
    {
        $education_detail = UserEducationDetail::find($id);

        return $education_detail->delete();
    }
}