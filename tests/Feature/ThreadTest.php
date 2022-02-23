<?php

use App\Models\Thread;
use App\Models\User;

test('user yang sudah login dapat membuat thread baru', function () {
    // $this->withoutExceptionHandling();
    $threads = Thread::factory()->make();
    // dd($threads->toArray());
    $user = User::factory()->create();
    $response = $this->actingAs($user)->post(route('threads.store'), $threads->toArray())->assertRedirect();
    expect($response->getStatusCode())->toEqual(302);
    // $response->assertStatus(200);
});

test('user yang sudah login tidak dapat membuat thread baru jika data mandatory tidak diisi', function () {
    // $this->withoutExceptionHandling();
    // dd($threads->toArray());
    $user = User::factory()->create();
    $response = $this->actingAs($user)->post(route('threads.store'), [
        'title' => ''
    ])->assertRedirect();
    expect($response->getStatusCode())->toEqual(302);
});

test('user yang belum login tidak dapat membuat thread', function () {
    $threads = Thread::factory()->make();
    $this->post(route('threads.store'), $threads->toArray())->assertRedirect(route('login'));
    $this->assertGuest();
});
