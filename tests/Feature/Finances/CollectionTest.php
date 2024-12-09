<?php

use App\Livewire\Finances\Collections\Create;
use App\Livewire\Finances\Collections\Edit;
use App\Livewire\Finances\Collections\Show;
use App\Models\Collection;
use App\Models\User;

test('user cannot see other user\'s collections', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();

    $collection = Collection::factory()->create([
        'user_id' => $user1->id,
    ]);

    $this->actingAs($user2);

    Livewire::test(Show::class, ['collection' => $collection->id])
        ->assertForbidden();
});

test('user can see it\'s collections', function () {
    $user = User::factory()->create();

    $collection = Collection::factory()->create([
        'user_id' => $user->id,
    ]);

    $this->actingAs($user);

    Livewire::test(Show::class, ['collection' => $collection->id])
        ->assertSee($collection->name);
});

test('collection creation validates form', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    Livewire::test(Create::class)
        ->set('form.name', '')
        ->set('form.type', 'new')
        ->call('save')
        ->assertHasErrors([
            'form.name' => 'required',
        ]);
});

test('collection creation is successful', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    Livewire::test(Create::class)
        ->set('form.name', 'New Collection')
        ->set('form.type', 'new')
        ->set('typeForm.name', 'New Type')
        ->set('form.description', 'New Description')
        ->call('save')
        ->assertHasNoErrors();
});

test('collection editing validates form', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $collection = Collection::factory()->create([
        'user_id' => $user->id,
    ]);

    Livewire::test(Edit::class, ['collection_id' => $collection->id])
        ->set('form.name', '')
        ->call('edit')
        ->assertHasErrors([
            'form.name' => 'required',
        ]);
});

test('collection editing is successful', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $collection = Collection::factory()->create([
        'user_id' => $user->id,
    ]);

    Livewire::test(Edit::class, ['collection_id' => $collection->id])
        ->set('form.name', 'New Collection')
        ->set('form.type', 'new')
        ->set('typeForm.name', 'New Type')
        ->set('form.description', 'New Description')
        ->call('edit')
        ->assertHasNoErrors();
});
