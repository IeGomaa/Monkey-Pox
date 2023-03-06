<?php

namespace App\Http\Traits\Contact;

trait ContactTrait
{
    private function getContacts()
    {
        return $this->contactModel::get();
    }

    private function findContact($id)
    {
        return $this->contactModel::find($id);
    }
}
