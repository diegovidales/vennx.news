<?php

namespace App\Livewire\Forms;

use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class NewsForm extends Form
{
    //
    public ?News $news;

    #[Validate('required')] 
    public $title;
    public $description;
    public $image_path;

    public function setNews(News $news)
    {
        $this->news = $news;
        $this->title = $news->title;
        $this->description = $news->description;
        $this->image_path = $news->image_path;
    }

    public function create($image)
    {
        $this->validate();
         // salva nova imagem, se houver
         if($image) {
            // salva nova imagem e o caminho dela
            $this->image_path = str_replace('public/', '',$image->store(path: 'public/' . News::IMAGE_DIRECTORY));
        }
        $this->news = auth()->user()->news()->create([
            'title' => $this->title,
            'description' => $this->description,
            'image_path' => $this->image_path
        ]);
    }

    public function delete()
    {
        $this->removeOldImage();
        $this->news->delete();
    }

    public function update($image)
    {
        $this->validate();
        // salva nova imagem, se houver
        if($image) {
            // remove imagem anterior (se houver)
            $this->removeOldImage();
            // salva nova imagem e o caminho dela
            $this->image_path = str_replace('public/', '',$image->store(path: 'public/' . News::IMAGE_DIRECTORY));

        } elseif(!$this->image_path) {
            // remove imagem anterior caso ela tenha sido removida no formulário
            $this->removeOldImage();
        }
        $this->news->update([
            'title' => $this->title,
            'description' => $this->description,
            'image_path' => $this->image_path
        ]);
    }

    public function removeOldImage()
    {
        if ($this->news->image_path) {
            // Remove a imagem atual da storage
            Storage::disk('public')->delete($this->news->image_path);
        }
    }
}
