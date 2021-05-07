<?php
  
namespace App\Exports;
  
use App\Models\Post;

use DB;

use Maatwebsite\Excel\Concerns\FromCollection;
  
class GuestPostsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Post::where('deleted_id', '=',NUll)->get();
    }
}