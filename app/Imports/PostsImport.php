<?php
   
namespace App\Imports;
   
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Post;
use Auth;
    
class PostsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Post::create([
            'title' => $row['title'],
            'description' => $row['description'],
            'status' =>'1',
            'create_user_id' =>Auth::user()->id,
            'create_at' =>now(),
        ]);
    }
}