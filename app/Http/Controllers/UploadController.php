<?php
namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\BlogRequestController;
use App\UploadFile;
use File;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use League\Flysystem\Exception;
use UploadImage;
use Dan\UploadImage\Exceptions\UploadImageException;
/**
 * Class UploadController
 * @package App\Http\Controllers
 */
class UploadController extends Controller
{

    public function index()
    {
        return view('uploadFile._uploadFile');
    }


    public function upload(Request $request)
    {


    }

    private function getName($file)
    {

    }

    public function move(Request $request, $file)
    {
        $file_path = [];
        if ($request->hasFile('file_name')) {
            foreach ($request->file('file_name') as $file) {
                $path = $file->move('multiple-images', $this->getName($file));
                $file_path[] = $path->getPathname();
            }
        }

           $file_name = sprintf(
            '%s_%s',
            time(),
            $file->getClientOriginalName()
        );

        try {
            DB::beginTransaction();
             UploadFile::create([
                    'file_name' => $file_name,
                    'File_path' => $file_path
                ]);

            DB::commit();

        }catch (\Exception $e) {
            File::delete('images', $file_name);
            DB::rollBack();

        }

        return redirect()->route('blog.index');
    }
}