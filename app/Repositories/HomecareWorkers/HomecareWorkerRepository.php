<?php
namespace App\Repositories\HomecareWorkers;

use App\Models\HomecareWorkers\HomecareWorker;
use App\Models\UserDetail;
use Carbon\Carbon;

class HomecareWorkerRepository {

    public function getAll(array $filters) 
    {
        $HCWs = HomecareWorker::orderBy('created_at', 'desc')->get();

        return $HCWs;
    }

    public function getById($id)
    {
       $HCW = HomecareWorker::find($id);

       return $HCW;
    }

    public function save($data)
    {
        $data['password'] = bcrypt('password');

        $hcw = new HomecareWorker($data);
        $hcw->save();

        // save the details too
        $details = [];
        if (isset($data['detail'])) {
            
            $details = $data['detail'];

        }

        $hcw->detail()->save(new UserDetail($details));

        $hcw->load(['detail']);
        $hcw->refresh();

        return $hcw;
    }

    public function update($id, $data)
    {
        $hcw = HomecareWorker::find($id);

        $hcw->update($data);

        if (isset($data['detail']))

            // below code is because the set in userDetail model not working for update
            // check below, saving as date before entered daTE. check later
            $data['detail']['dob'] = Carbon::parse($data['detail']['dob']);

            $hcw->detail()->update($data['detail']);

        $hcw->refresh();

        return $hcw;
    }

    public function delete($id): bool
    {
        $hcw = HomecareWorker::find($id);

        return $hcw->delete();
    }

}