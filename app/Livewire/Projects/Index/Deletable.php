<?php

namespace App\Livewire\Projects\Index;

use App\Models\Project;

trait Deletable
{
    protected function deleteProject($contactId)
    {
        $contact = Project::findOrFail($contactId);
        $contact->delete();
    }
}
