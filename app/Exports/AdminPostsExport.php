<?php
  
namespace App\Exports;
  
use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
  
class AdminPostsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Post::get();
    }
}