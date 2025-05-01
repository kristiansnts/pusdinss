<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function afterCreate(): void
    {
        $roles = $this->data['roles'] ?? [];

        if (empty($roles)) {
            $this->record->assignRole('user');
        } else {
            $this->record->syncRoles($roles);
        }
    }
}
