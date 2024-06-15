<?php

use App\Livewire\Modals\DeleteNews;
use App\Livewire\Modals\UpdateNews;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

// o modal para update e create executou corretamente
it('update renders successfully', function () {
    Livewire::test(UpdateNews::class)
        ->assertStatus(200);
});

// o modal para delete executou corretamente
it('delete renders successfully', function () {
    Livewire::test(DeleteNews::class)
        ->assertStatus(200);
});

// qualquer usuário pode criar uma notícia
it('can create news', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    
    $image = UploadedFile::fake()->image('news.jpg');

    $title = fake()->sentence();
    $description = fake()->paragraphs(20,true);

    Livewire::test(UpdateNews::class)
        ->set([
            'news.news' => News::make(),
            'news.title' => $title,
            'news.description' => $description,
            'image' => $image
        ])
        ->call('save');

    $this->assertDatabaseHas('news', [
        'title' => $title,
        'description' => $description,
        'user_id' => $user->id
    ]);
});

// O usuário que criou a notícia pode excluir
it('can delete news', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $news = News::factory()->user($user->id)->create();

    Livewire::test(DeleteNews::class)
        ->set('news.news', $news)
        ->call('delete');
    
    $this->assertDatabaseMissing('news', ['id' => $news->id]);
});

// Se não for o usuário que criou a notícia, ele não pode excluir
it('cant be deleted if isnt the user creator', function () {
    $news = News::factory()->create();
    $user = User::factory()->create();
    $this->actingAs($user);

    Livewire::test(DeleteNews::class)
        ->set('news.news', $news)
        ->call('delete');
    
    $this->assertDatabaseHas('news', ['id' => $news->id]);
});

// O usuário que criou a notícia pode atualizar
it('can update news', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $news = News::factory()->user($user->id)->create();

    $image = UploadedFile::fake()->image('news.jpg');

    $title = fake()->sentence();
    $description = fake()->paragraphs(100,true);

    Livewire::test(UpdateNews::class)
        ->set([
            'news.news' => $news,
            'news.title' => $title,
            'news.description' => $description,
            'image' => $image
        ])
        ->call('save');

    $this->assertDatabaseHas('news', [
        'title' => $title,
        'description' => $description,
        'user_id' => $user->id
    ]);
});

// Se não for o usuário que critou a notícia, ele não pode atualizar
it('cant be updated if isnt the user creator', function () {
    $news = News::factory()->create();
    $user = User::factory()->create();
    $this->actingAs($user);

    $image = UploadedFile::fake()->image('news.jpg');

    $title = fake()->sentence();
    $description = fake()->paragraphs(100,true);

    Livewire::test(UpdateNews::class)
        ->set([
            'news.news' => $news,
            'news.title' => $title,
            'news.description' => $description,
            'image' => $image
        ])
        ->call('save');

    $this->assertDatabaseMissing('news', [
        'title' => $title,
        'description' => $description,
        'user_id' => $user->id
    ]);
});

