<?php
namespace App\Repositories\Users;

use App\Models\HomecareWorkers\HomecareWorker;
use App\Models\UserEmergencyContact;

class UserEmergencyContactRepository {

    public function save($data)
    {

        $contact = new UserEmergencyContact($data);
        
        $contact->save();

        return $contact;

    }

    public function update($id, $data)
    {
        $contact = UserEmergencyContact::find($id);
        
        $contact->update($data);

        return $contact;
    }

    public function delete($id)
    {
        $contact = UserEmergencyContact::find($id);

        return $contact->delete();
    }
}