<?php

use App\Models\Place;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;

uses(RefreshDatabase::class);

it('can fetch a list of places', function () {
    Place::factory()->count(3)->create();

    $response = $this->getJson('/api/places');

    $response->assertStatus(200)
             ->assertJsonCount(3, 'data');
});

it('can create a place', function () {
    $placeData = Place::factory()->raw();

    $response = $this->postJson('/api/places', $placeData);

    $response->assertStatus(201)
             ->assertJsonFragment($placeData);
});

it('can fetch a single place', function () {
    $place = Place::factory()->create();

    $response = $this->getJson("/api/places/{$place->id}");

    $response->assertStatus(200)
             ->assertJsonFragment([
                 'id' => $place->id,
                 'name' => $place->name,
                 'slug' => $place->slug,
                 'city' => $place->city,
                 'state' => $place->state,
                 'created_at' => $place->created_at->format('d-m-Y H:i:s'),
                 'updated_at' => $place->updated_at->format('d-m-Y H:i:s'),
             ]);
});

it('can update a place', function () {
    $place = Place::factory()->create();
    $updatedData = ['name' => 'Updated Place'];

    $response = $this->putJson("/api/places/{$place->id}", $updatedData);

    $response->assertStatus(200)
             ->assertJsonFragment($updatedData);

    $this->assertDatabaseHas('places', $updatedData);
});

it('can delete a place', function () {
    $place = Place::factory()->create();

    $response = $this->delete("/api/places/{$place->id}");

    $response->assertNoContent();

    $this->assertDatabaseMissing('places', ['id' => $place->id]);
});
