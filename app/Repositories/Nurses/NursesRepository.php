<?php
namespace App\Repositories\Nurses;

use App\Models\Nurses\Nurse;
use App\Models\UserDetail;
use Carbon\Carbon;

class NursesRepository {

    public function getAll(array $filters) 
    {
        $nurses = Nurse::orderBy('created_at', 'desc')->get();

        return $nurses;
    }

    public function getById($id)
    {
       $nurse = Nurse::find($id);

       return $nurse;
    }

    public function save($data)
    {
        $data['password'] = bcrypt('password');

        $nurse = new Nurse($data);
        $nurse->save();

        // save the details too
        $details = [];
        if (isset($data['detail'])) {
            
            $details = $data['detail'];

        }

        $nurse->detail()->save(new UserDetail($details));

        $nurse->load(['detail']);
        $nurse->refresh();

        return $nurse;
    }

    public function update($id, $data)
    {
        $nurse = Nurse::find($id);

        $nurse->update($data);

        if (isset($data['detail']))

            // below code is because the set in userDetail model not working for update
            // check below, saving as date before entered daTE. check later
            $data['detail']['dob'] = Carbon::parse($data['detail']['dob']);

            $nurse->detail()->update($data['detail']);

        $nurse->refresh();

        return $nurse;
    }

    public function delete($id): bool
    {
        $nurse = Nurse::find($id);

        return $nurse->delete();
    }

}