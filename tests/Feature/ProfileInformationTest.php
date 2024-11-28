<?php

use App\Models\User;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;
use Livewire\Livewire;

test('La información del perfil actual está disponible', function () {
    $this->actingAs($user = User::factory()->create());

    $component = Livewire::test(UpdateProfileInformationForm::class);

    expect($component->state['name'])->toEqual($user->name);
    expect($component->state['email'])->toEqual($user->email);
});

test('La información del perfil se puede actualizar', function () {
    $this->actingAs($user = User::factory()->create());

    Livewire::test(UpdateProfileInformationForm::class)
        ->set('state', ['name' => 'Test Name', 'email' => 'test@example.com'])
        ->call('updateProfileInformation');

    expect($user->fresh())
        ->name->toEqual('Test Name')
        ->email->toEqual('test@example.com');
});
